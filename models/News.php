<?php

namespace models;

use core\Utils;
use Imagick;

class News extends \core\Model
{
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/news/';
        $file_path = pathinfo($folder . $file);
        $file_big = $file_path['filename'] . '_b';
        $file_middle = $file_path['filename'] . '_m';
        $file_small = $file_path['filename'] . '_s';

        $news = $this->GetNewsById($id);
        if (is_file($folder . $news['photo'] . '_b.jpg') && is_file($folder . $file))
            unlink($folder . $news['photo'] . '_b.jpg');
        if (is_file($folder . $news['photo'] . '_m.jpg') && is_file($folder . $file))
            unlink($folder . $news['photo'] . '_m.jpg');
        if (is_file($folder . $news['photo'] . '_s.jpg') && is_file($folder . $file))
            unlink($folder . $news['photo'] . '_s.jpg');
        $news['photo'] = $file_path['filename'];
        $im_b = new Imagick();
        $im_b->readImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . $file);
        $im_b->cropThumbnailImage(1280, 1024, true);
        $im_b->writeImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/' . $file_big . '.jpg');
        $im_m = new Imagick();
        $im_m->readImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . $file);
        $im_m->cropThumbnailImage(400, 400, true);
        $im_m->writeImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/' . $file_middle . '.jpg');
        $im_s = new Imagick();
        $im_s->readImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . $file);
        $im_s->cropThumbnailImage(180, 180, true);
        $im_s->writeImage($_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/' . $file_small . '.jpg');
        unlink($folder . $file);
        $this->UpdateNews($news, $id);
    }

    public function AddLike($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        $news = $this->GetNewsById($id);
        if ($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аунтефікований']
            ];
            return $result;
        }
        if (!empty($this->CheckSelect($id))) {
            $result = [
                'error' => true,
                'messages' => ['Ви вже оцінювали новину']
            ];
            return $result;
        } else {
            $fields = [];
            $RowFiltered = Utils::ArrayFilter($row, $fields);
            $RowFiltered['user_id'] = $user['id'];
            $RowFiltered['news_id'] = $news['id'];
            $RowFiltered['checked'] = 1;
            $RowFiltered['likes'] += 1;
            $id = \core\Core::getInstance()->getDB()->insert('likes', $RowFiltered);
            return [
                'error' => false,
                'id' => $id
            ];
        }

    }

    public function AddComment($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        $news = $this->GetNewsById($id);
        if ($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аунтефікований']
            ];
            return $result;
        }
        $validateResult = $this->ValidateComment($row);
        if (is_array($validateResult)) {
            $result = [
                'error' => true,
                'messages' => $validateResult
            ];
            return $result;
        }
        $fields = ['text'];
        $RowFiltered = Utils::ArrayFilter($row, $fields);
        $RowFiltered['datetime'] = date('Y-m-d H:i:s');
        $RowFiltered['user_id'] = $user['id'];
        $RowFiltered['news_id'] = $news['id'];
        $RowFiltered['firstname'] = $user['firstname'];
        $id = \core\Core::getInstance()->getDB()->insert('comments', $RowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    public function AddNews($row)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аунтефікований']
            ];
            return $result;
        }
        $validateResult = $this->Validate($row);
        if (is_array($validateResult)) {
            $result = [
                'error' => true,
                'messages' => $validateResult
            ];
            return $result;
        }
        $fields = ['title', 'short_text', 'text'];
        $RowFiltered = Utils::ArrayFilter($row, $fields);
        $RowFiltered['datetime'] = date('Y-m-d H:i:s');
        $RowFiltered['user_id'] = $user['id'];
        $RowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('news', $RowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    public function GetAllNews()
    {
        $news = \core\Core::getInstance()->getDB()->select('news', '*');
        if (!empty($news))
            return $news;
        else
            return null;
    }

    public function GetAllComments()
    {
        $comments = \core\Core::getInstance()->getDB()->select('comments', '*');
        if (!empty($comments))
            return $comments;
        else
            return null;
    }

    public function GetLastNews($count)
    {
        return \core\Core::getInstance()->getDB()->select('news', '*', null, ['datetime' => 'DESC'], $count);
    }

    public function GetAllLikes($id)
    {
        $news = $this->GetNewsById($id);
        return \core\Core::getInstance()->getDB()->count('news_id', 'likes', ['news_id' => $news['id']]);
    }

    public function GetLastLikes()
    {
        return \core\Core::getInstance()->getDB()->select('likes', '*', null);
    }

    public function CheckSelect($id)
    {
        $news = $this->GetNewsById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        return \core\Core::getInstance()->getDB()->select('likes', '*', ['user_id' => $user['id'], 'news_id' => $news['id']]);
    }

    public function GetLastComments($id)
    {
        $news = $this->GetNewsById($id);
        return \core\Core::getInstance()->getDB()->select('comments', '*', ['news_id' => $news['id']], ['datetime' => 'DESC']);
    }

    public function ValidateComment($row)
    {
        $errors = [];
        if (empty($row['text']))
            $errors[] = 'Поле "Текст коментаря" не може бути порожнім';
        if (count($errors) > 0)
            return $errors;
        else
            return true;
    }

    public function Validate($row)
    {
        $errors = [];
        if (empty($row['title']))
            $errors[] = 'Поле "Заголовок новини" не може бути порожнім';
        if (empty($row['short_text']))
            $errors[] = 'Поле "Короткий текст новини" не може бути порожнім';
        if (empty($row['text']))
            $errors[] = 'Поле "Повний текст новини" не може бути порожнім';
        if (count($errors) > 0)
            return $errors;
        else
            return true;
    }

    public function GetNewsById($id)
    {
        $news = \core\Core::getInstance()->getDB()->select('news', '*', ['id' => $id]);
        if (!empty($news))
            return $news[0];
        else
            return null;
    }

    public function GetCommentById($id)
    {
        $comment = \core\Core::getInstance()->getDB()->select('comments', '*', ['id' => $id]);
        if (!empty($comment))
            return $comment[0];
        else
            return null;
    }

    public function UpdateNews($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null)
            return false;
        $validateResult = $this->Validate($row);
        if (is_array($validateResult))
            return $validateResult;
        $fields = ['title', 'short_text', 'text', 'photo'];
        $RowFiltered = Utils::ArrayFilter($row, $fields);
        $RowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('news', $RowFiltered, ['id' => $id]);
        return true;
    }

    public function DeleteNews($id)
    {
        $news = $this->GetNewsById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user['id'] == $news['user_id'] || $user['access'] == 1) {
            \core\Core::getInstance()->getDB()->delete('news', ['id' => $id]);
            \core\Core::getInstance()->getDB()->delete('comments', ['id' => $id]);
            \core\Core::getInstance()->getDB()->delete('likes', ['news_id' => $id]);
            return true;
        } else
            return false;
    }

    public function DeleteComment($id)
    {
        $comment = $this->GetCommentById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user['id'] == $comment['user_id'] || $user['access'] == 1) {
            \core\Core::getInstance()->getDB()->delete('comments', ['id' => $id]);
            return true;
        } else
            return false;
    }

    public function DeleteLikes($id)
    {
        $news = $this->GetNewsById($id);
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if ($user['id'] == $news['user_id'] || $user['access'] == 1) {
            \core\Core::getInstance()->getDB()->delete('likes', ['news_id' => $news['id']]);
            return true;
        } else
            return false;
    }
}