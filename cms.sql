-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2022 г., 20:05
-- Версия сервера: 5.5.62
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `text`, `datetime`, `firstname`) VALUES
(1, 17, 37, '[dsadsadsadasdasdas]', '0000-00-00 00:00:00', ''),
(3, 18, 36, '<p>dassadasdsadas</p>', '2022-07-21 12:44:03', 'MainAdmin'),
(4, 18, 37, '<p>вфівфівфі</p>', '2022-07-22 12:06:58', 'MainAdmin'),
(6, 19, 38, '<p>sadasdasdasdasd asDas DSA dsa DS</p>', '2022-07-22 17:48:56', 'MainAdmin'),
(7, 18, 37, '<p>Віфвіфвфівфівфівфівфі</p>', '2022-07-23 13:18:03', 'MainAdmin'),
(8, 18, 37, '<p>ВіфвіфвфівфівфівфівфіВіфвіфвфівфівфівфівфіВіфвіфвфівфівфівфівфіВіфвіфвфівфівфівфівфіВіфвіфвфівфівфівфівфіВіфвіфвфівфівфівфівфі</p>', '2022-07-23 13:18:13', 'MainAdmin'),
(11, 20, 37, '<p>((</p><p>&nbsp;</p>', '2022-07-23 15:01:57', 'Danylo'),
(12, 18, 38, '<p>dsawdasdasdasdas</p>', '2022-07-24 15:54:47', 'MainAdmin'),
(13, 18, 41, '<p>Фуууу</p>', '2022-07-24 16:08:11', 'MainAdmin');

-- --------------------------------------------------------

--
-- Структура таблицы `difftext`
--

CREATE TABLE `difftext` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `difftext`
--

INSERT INTO `difftext` (`id`, `title`, `short_text`, `datetime`, `datetime_lastedit`, `user_id`, `text`) VALUES
(1, 'Співробітництво Житомирської політехніки з університетами Туреччини', '<p>Впродовж останніх місяців тривали переговори з двома ЗВО Турецької Республіки</p>', '2022-07-21 11:43:06', '2022-07-21 11:48:58', 18, '<p>Державний університет «Житомирська політехніка» співпрацює із зарубіжними партнерами з багатьох країн світу. Попри те, що основним напрямком міжнародної взаємодії є співробітництво з ЗВО Європейського союзу, досить активно розвиваються зв’язки з університетами Туреччини.1</p>'),
(4, 'У мене біполярний розлад', '<p>Дарині Бук у 18 років поставили діагноз</p>', '2022-07-24 16:03:40', NULL, 18, '<p>Дарині Бук у 18 років поставили діагноз – біполярний афективний розлад (БАР). Людина з цим розладом зазвичай не може повністю контролювати свій настрій. Спочатку вона може відчувати сильний, часто невмотивований енергетичний підйом, згодом безпричинну депресію. У маніакальному стані людина спроможна переоцінювати власні сили та неадекватно сприймати ситуацію.</p><p>«Одного дня я зрозуміла, що не можу встати з ліжка. Це було приблизно у 14 років. Я не могла нічого робити – ні їсти, ні спати. Мене ніби прибивали цвяхом. Це був дуже тривожний дзвіночок. Я просилася до лікаря, але мама казала, що не вірить у таблетки та лікарів».&nbsp;</p>'),
(5, 'Мої голі фото опублікували в інтернеті', '<p>Таня Русіна 7 років намагалася забути історію</p>', '2022-07-24 16:04:28', NULL, 18, '<p>Таня Русіна 7 років намагалася забути історію, в яку потрапила, коли їй було 20. У соцмережі дівчині запропонували знятися у фотосесії, за яку пообіцяли заплатити хороші гроші (за мірками 2011 року). Складні стосунки з мамою та вітчимом на тлі проблем зі здоров’ям та відсутністю грошей на лікування наштовхнули її на думку, що це, можливо, непоганий спосіб вирішити питання.&nbsp;Чому вона погодилася повністю роздягтися на камеру? Чому повірила незнайомим людям? І найважче – як пережила, коли всі друзі та близькі побачили її оголені фотографії в соцмережах?</p>'),
(6, 'Я почала жити після 40', '<p>Олені Рижко 43 роки.</p>', '2022-07-24 16:05:09', NULL, 18, '<p>Олені Рижко 43 роки. Вона все завжди робила правильно – росла доброю дитиною, не плакала перед батьками, з першого разу вступила до університету, вийшла заміж за того, кого хотіла родина, та народила сина; мала зрозумілі кар’єрні цілі та всіма силами намагалася бути «ідеальною дівчиною». У житті Олена найбільше боялася розчарувати рідних, які її любили та мали щодо неї високі очікування. Цей мотив урешті став головним. Як це – почати жити для себе після 40 років?</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `news_id` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `checked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`news_id`, `likes`, `user_id`, `checked`) VALUES
(0, 0, 0, 0),
(37, 1, 20, 1),
(36, 1, 18, 1),
(41, 1, 18, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Новини';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `short_text`, `datetime`, `datetime_lastedit`, `user_id`, `text`, `photo`) VALUES
(29, 'У Львові поліцейські повідомили про підозру директорці підприємства', '<p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це повідомили у відділі комунікації Нацполіції Львівщини.</p>', '2022-01-17 13:45:15', '2022-01-17 14:32:47', 15, '<p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p><p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p><p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p><p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p><p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p><p>У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.У Львові поліцейські повідомили про підозру директорці підприємства, яка привласнила майже півтора мільйона гривень державних коштів на ремонті вулиці. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили у відділі комунікації Нацполіції Львівщини.</p>', '_61e553df55819'),
(32, 'У Порошенка намагалися відібрати паспорт?', '<p>У ході перетину державного кордону п’ятим Президентом України Петром Порошенком прикордонники чітко дотримувалися норм законодавства.</p>', '2022-01-17 14:20:39', '2022-01-17 14:21:52', 15, '<p>Держприкордонслужба повідомила, що під час проходження держкордону Порошенком відбувалися маніпуляції від окремих осіб, що, начебто, дану особу намагаються не пропустити в Україну.</p><p>«Кожна особа проходить визначені заходи прикордонного контролю, які тривають необхідну кількість часу… Петро Порошенко був оформлений у прикордонному відношенні на в’їзд в Україну», – йдеться у повідомленні.</p><p>Окрім того, під час заходів контролю про прибуття Петра Порошенка в Україну прикордонники повідомили представників правоохоронних органів, для «забезпечення розшуку осіб, які переховуються від органів досудового розслідування та суду, а також виконання в установленому порядку доручень правоохоронних органів».</p><p>Водночас <a href=\"https://www.pravda.com.ua/news/2022/01/17/7320615/\">Українська правда</a> повідомила, що коли Петро Порошенко прилетів до Києва, на митному контролі у нього забрали паспорт.</p>', '_61e55150018b5'),
(34, 'У ДБР кажуть, що в аеропорту намагалися вручити Порошенку повістку в суд', '<p>У Державному бюро розслідувань пояснили, що в аеропорту намагалися вручити процесуальні документи п’ятому президенту України Петру Порошенку, але той відмовився їх узяти. Про це повідомила радник з комунікацій ДБР Тетяна Сапьян на брифінгу 17 січня, відповідаючи на запитання журналістів, пише Українська правда.</p>', '2022-01-17 14:36:29', '2022-01-17 14:37:46', 15, '<p>У Державному бюро розслідувань пояснили, що в аеропорту намагалися вручити процесуальні документи п’ятому президенту України Петру Порошенку, але той відмовився їх узяти. Про це повідомила радник з комунікацій ДБР Тетяна Сапьян на брифінгу 17 січня, відповідаючи на запитання журналістів, пише <a href=\"https://www.pravda.com.ua/news/2022/01/17/7320628/\">Українська правда.</a></p><p>«Співробітники ДБР намагалися вручити процесуальні документи, а саме повістку в суд», – повідомила вона.</p><p>За словами Сапьян, Порошенко відмовився від їх отримання. У ДБР також стверджують, що особи, які супроводжували політика, чинили опір правоохоронцям. Сапьян каже, що захисники Порошенка сказали, що отримають документи після проходження паспортного контролю, але потім «штучно створили штовханину і втекли».</p><p>Відповідаючи на уточнююче запитання, чи можливе затримання Порошенка, комунікатор ДБР запевнила, що «сила – це останнє що буде залучатися до цього процесу».</p><p>Раніше повідомлялось, що у Петра Порошенка намагалися <a href=\"https://portal.lviv.ua/news/2022/01/17/u-poroshenka-namahalysia-vidibraty-pasport\">відібрати паспорт.</a> Його під аеропортом зустрічали <a href=\"https://portal.lviv.ua/news/2022/01/17/poroshenka-pid-aeroportom-zustrichaly-tysiachi-prykhylnykiv\">тисячі прихильників</a>.</p>', '_61e554c89ba23'),
(35, 'У Комарному під колесами авто загинув 32-річний пішохід', '<p>Аварія сталась близько 00:05 год. 17 січня в місті Комарно Львівського району.</p>', '2022-01-17 14:38:45', '2022-01-17 14:39:21', 15, '<p>Вночі 17 січня в місті Комарно на Львівщині водій автомобіля Dacia Logan збив 32-річного чоловіка. Від отриманих травм пішохід загинув на місці аварії. Про це <a href=\"https://portal.lviv.ua/\">Львівському порталу</a> повідомили в депатаметі цивільного захисту населення Львівської ОДА.</p><p>Аварія сталась близько 00:05 год. 17 січня в місті Комарно Львівського району.</p><p>41-річний мешканець села Чуловичі, керуючи автомобілем Dacia Logan, насмерть збив пішохода. Загиблим виявився 32-річний мешканець села Катериничі Львівсього району.</p><p>Обставини події встановлюються.</p>', '_61e5556967210'),
(36, 'Вбили 5 років тому: львів’янина Тараса Познякова поховають цього тижня', '<p>Водія BlaBlaCar, львів’янина Тараса Познякова, вбитого попутниками у 2016 році, поховають у Дніпрі 21-го січня. Про це у&nbsp;Фейсбук&nbsp;повідомила його мати Ольга Король.</p>', '2022-01-17 14:41:04', '2022-01-17 14:41:22', 15, '<p>Водія BlaBlaCar, львів’янина Тараса Познякова, вбитого попутниками у 2016 році, поховають у Дніпрі 21-го січня. Про це у&nbsp;Фейсбук&nbsp;повідомила його мати Ольга Король.</p><p>Правоохоронні органи закінчили всі потрібні експертизи та дозволили батькам поховати тіло сина.</p><p>«Не можу написати «відбудеться прощання з Тарасиком», адже він завжди поруч з нами, з&nbsp; його турботою, з&nbsp; його оптимізмом, широкою посмішкою та відкритою душею. Так&nbsp; було раніше, так є сьогодні та так буде завжди», – написала мама Познякова.</p><p>Відспівування Тараса Познякова відбудеться 20 січня у Києві у Свято-Михайлівському соборі, Варваринському приділі о 13:00. Поховають львів’янина у Дніпрі. Чин похорону відбудеться у четвер, 21 січня, об 11:00.</p><p>Нагадаємо, 25-річний&nbsp;<a href=\"https://portal.lviv.ua/news/2016/04/08/trivayut-poshuki-molodogo-lviv-yanina-shho-znik-iz-poputnikami-z-blablacar?fbclid=IwAR2y1SY7BtKjz5ebmxyrvv1IqQO8ihWv8qgRtCyatfxsWIluz_yWfLSDXVM\">львів’янин</a>&nbsp;Тарас Позняков у квітні 2016 року виїхав зі Львова до Києва приватним транспортом із попутниками з BlaBlaCar. Потім зв’язок з ним обірвався. Через тиждень поліція знайшла автомобіль Тараса в одному з гаражів Києво-Святошинського району.</p><p>Згодом правоохоронці оголосили&nbsp;<a href=\"https://portal.lviv.ua/news/2016/05/06/politsiya-rozshukuye-dvoh-pidozryuvanih-u-vbivstvi-tarasa-poznyakova-foto?fbclid=IwAR0iI9-H_QgaQAdwyphAiTTtPnp53GUc3ie7Mhelmw0_ZxzR8PCdHj-T9CM\">розшук</a>&nbsp;підозрюваних у вбивстві Познякова осіб – Дмитра Голуба та Луана Кінгісеппа.</p><p>У серпні 2016 року заарештували першого&nbsp;<a href=\"https://portal.lviv.ua/news/2016/08/05/politsiya-zatrimala-pidozryuvanogo-u-vbivstvi-lviv-yanina-tarasa-pozdnyakova?fbclid=IwAR1G1tlkFUjx-yXp9v98Cru9HCmEX7NsFJ5Jy3kqMHxWbc_uxjLUpISMn0k\">підозрюваного</a>&nbsp;у смерті Тараса – ексбійця «Правого сектора» Дмитра Голуба. Інший підозрюваний громадянин Російської Федерації Луан Кінгісепп загинув у 2019 році внаслідок вибуху в київській квартирі.</p><p>У травні 2019 року суд визнав винним Дмитра Голуба у вбивстві львів’янина та засудив його до&nbsp;<a href=\"https://portal.lviv.ua/news/2019/05/28/vbyvtsya-tarasa-poznyakova-otrymav-dovichne-uv-yaznennya?fbclid=IwAR3Ry5NYujhgIkdKKZV-IvBXQg-2bhUvq1YBbxneRtzjyJZnMV7qY9Caxs0\">довічного</a>&nbsp;ув’язнення.</p><p>Тіло Тараса Познякова вдалося&nbsp;<a href=\"https://portal.lviv.ua/news/2021/12/09/sbu-znajshla-tilo-vbytoho-lviv-ianyna-tarasa-pozniakova?fbclid=IwAR0od8pftOhkudVnJorm6fT9Yy_yqn-px7ZLSkToN32U31zpd_IFsGmKh5w\">знайти</a>&nbsp;тільки у грудні 2021 року поблизу траси «Житомир – Київ».</p>', '_61e555e219b57'),
(39, 'ISW: ЗСУ вже могли почати контрнаступ на Херсонщині', '<p>Українські сили, ймовірно, готуються розпочати або вже розпочали контрнаступ у Херсонській області.</p>', '2022-07-24 15:58:31', '2022-07-24 15:58:31', 18, '<p><strong>Джерело</strong>: аналітики американського Інституту дослідження війни (<a href=\"https://www.understandingwar.org/backgrounder/russian-offensive-campaign-assessment-july-23\">ISW</a>)</p><p><strong>Деталі</strong>:&nbsp; Інформація з відкритих джерел про хід та темпи контрнаступу, ймовірно, буде обмеженою та надходитиме з затримкою, відстаючи від реальних подій.</p><p>ISW пише, що район між лінією фронту та Херсоном є сільським і в основному складається з невеликих населених пунктів, які з меншою ймовірністю повідомляють про пересування військ та боїв, що дозволяє змінити контроль над місцевістю в цьому районі без доказів, які з\'являються у звітах з відкритих джерел.&nbsp; У російської влади також немає стимулу повідомляти про перемоги ЗСУ.</p><p>Інститут додає мапи бойових дій:</p>', '39_62dd41f72179a'),
(40, 'Мер просить харків\'ян не користуватися наземним транспортом уранці: терор РФ триває', '<p>Міський голова Харкова Ігор Терехов просить городян мінімізувати ранкові поїздки наземним громадським транспортом з міркувань безпеки.</p>', '2022-07-24 15:59:18', '2022-07-24 15:59:19', 18, '<p><strong>Деталі:</strong> За словами мера, тиждень показав, що тепер агресор навіть не вдає, що стріляє по військових об\'єктах.</p><p>Житлові будинки, ринки, торгові центри, школи, спортивні комплекси, університети та ін. Але найстрашніше – зупинки громадського транспорту. Саме туди окупант бив вранці середи та четверга.</p><p>Якраз у той самий час, коли багато хто з харків\'ян їхав на роботу. У <a href=\"https://www.pravda.com.ua/news/2022/07/21/7359323/\">четвер</a> було троє загиблих та 23 поранених. У середу на зупинці троє поранених та троє вбитих, серед них – 13-річний хлопчик. Його 15-річну сестру було поранено.</p><p><strong>Пряма мова</strong>: \"Цей терор проти нас триватиме. А наше головне завдання зараз – вижити і жити. Побудуйте свій графік пересування містом таким чином, щоб мінімізувати ранкові поїздки у наземному транспорті. Частіше користуйтеся метрополітеном – на сьогодні це найбезпечніший спосіб пересування.</p><p>Якщо вам потрібні продукти чи інша допомога – працюють наші управління соцзахисту та волонтерські організації. Ви завжди можете туди звернутись і вам допоможуть.</p>', '40_62dd422705537'),
(41, 'У діснеївських парках США можуть з’явитися феї-чоловіки', '<p>Феї-хрещені, які одягають дітей у діснеївських персонажів у бутіках тематичних парків США</p>', '2022-07-24 16:06:38', '2022-07-24 16:06:43', 18, '<p>Феї-хрещені, які одягають дітей у діснеївських персонажів у бутіках тематичних парків США, тепер називаються \"учнями фей\".</p><p>Таке нововведення запровадили, щоб зробити образ Феї з відомого мультфільму \"Попелюшка\" гендерно-нейтральним, <a href=\"https://edition.cnn.com/2022/07/23/business/disney-parks-fairy-god-mothers-inclusive/index.html\">повідомляє</a> ССN з посиланням на <a href=\"https://disneyworld.disney.go.com/shops/magic-kingdom/bibbidi-bobbidi-boutique-park/\">Walt Disney World</a>.</p><p>У парках такі феї роблять дітям макіяж, зачіску і підбирають костюм. Представник Disney повідомив, що компанія внесла зміни, аби дозволити чоловікам працювати в бутиках. Раніше роль фей дозволялося виконувати тільки жінкам.</p><p>Минулого року голова відділу парків Disney Джош Д\'Амаро заявив, що планує оновити атракціони та модернізувати цінності парку, зокрема і образи акторів.</p>', '41_62dd43ded5dd7');

-- --------------------------------------------------------

--
-- Структура таблицы `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `story`
--

INSERT INTO `story` (`id`, `title`, `short_text`, `datetime`, `datetime_lastedit`, `user_id`, `text`) VALUES
(1, 'Lorem ipsum 2', '<p>Lorem ipsum dolor sit amet, vel everti epicurei ad</p>', '2022-07-21 11:05:09', '2022-07-21 11:07:03', 18, '<p>Lorem ipsum dolor sit amet, vel everti epicurei ad. Homero offendit eos at. Ad vitae vidisse vim, quo meis dicat ex, ut nam esse nostrum aliquando. Eam te erant mentitum, per an accumsan indoctum. Ea graecis alienum pro, id aperiam officiis oportere quo, apeirian legendos ex eum. No delenit senserit duo, posse primis invenire vix an.</p><p>Wisi disputando ea his. Pri scaevola periculis at, fugit offendit ut cum, sed at solum libris euripidis. No his legere salutandi. Adhuc reque adipiscing no per, ne vim magna inermis detracto, ea nullam electram est.</p>'),
(2, 'Eam aeterno omittam apeirian cu', '<p><strong>Eam aeterno omittam apeirian cu, malis electram vis ad. Mutat suscipiantur mea no, ad qui quodsi philosophia. Ex esse iudicabit instructior est, at affert civibus disputando vis. Eos ne wisi argumentum, eu duo scripta invidunt.</strong></p>', '2022-07-21 11:08:03', NULL, 18, '<p>Eam aeterno omittam apeirian cu, malis electram vis ad. Mutat suscipiantur mea no, ad qui quodsi philosophia. Ex esse iudicabit instructior est, at affert civibus disputando vis. Eos ne wisi argumentum, eu duo scripta invidunt.</p><p>An iriure veritus nam, ad feugait docendi usu. Ne meis altera convenire nec, at melius laoreet vix. Case laboramus rationibus sit at, id libris putant eam. Ut vis meliore similique constituam. Sit choro volutpat no. Constituto sententiae dissentiet his te, cu quem postulant efficiantur vix.</p><p>Partiendo accusamus dissentiunt at duo, harum vituperata has id. Mel cu nemore voluptaria deseruisse, et tale ignota sea. Ad euismod vivendo epicurei vel, sea et partem virtute omnesque. Copiosae instructior eu nam, duis choro corrumpit usu ut, cetero accusam cu nec. Tota posse dissentias ne per, cu sed prompta deserunt mnesarchum.</p><p>Inani tation explicari et pro. Fuisset explicari vis et, fabulas assentior cum et. Altera moderatius appellantur qui ei, te fugit labores usu. Eos tale wisi legimus eu, docendi delicata rationibus sed et.</p><p>Vide erroribus ei nam, fugit euismod eum ut. Doming facilis euripidis sit ea, dicta scribentur sed te. Eam omnis patrioque tincidunt cu. Eos ne dolorem menandri quaestio, eum amet malorum ex, in quo paulo equidem adipiscing. Et principes consetetur vix, aperiam feugait mel ne.</p><p>Sed ea detracto fabellas, no autem aliquam est, soleat euismod dolorem in ius. Cum populo postulant efficiantur id. Primis propriae id qui, eos in ubique feugait. An mei sint stet principes, te mei nemore dissentiet.</p><p>Cu minim latine consequuntur vix, has sint ubique dolorem ad. Viris omnes repudiare his ei, ea vel vidit debet honestatis. Tamquam fabulas et sed, in prima platonem adolescens quo, qui facilis accumsan invidunt in. Omnesque persecuti consectetuer et sea, sed in iudico epicurei. Nec munere oporteat deserunt et, mei posidonium delicatissimi eu, mel cu velit urbanitas constituam. Cu appareat efficiantur pro, eu soluta omittam cum.</p><p>Splendide mnesarchum accommodare ex vix, nec ne dicit noluisse sapientem. Adversarium repudiandae reprehendunt sea in, id per eruditi deterruisset, ius eu iudico mollis ancillae. Sed ad nostro saperet delicatissimi, periculis forensibus an vel. Usu ut adipisci periculis, suavitate explicari ne eos, in velit dictas corrumpit eum.</p><p>Cum in purto dolorem, posse noluisse usu ad. At omnis melius sed. Ne tractatos constituam neglegentur duo, usu quot phaedrum in. At justo perpetua principes has, ne sed primis platonem pericula. Et vis assum scripta inermis. Has quis necessitatibus ad. Nec at ullum virtute detraxit, has probo brute assentior ex.</p>'),
(3, 'Якщо йдеш — іди...', '<p>«Ми&nbsp;з&nbsp;тобою надто різні!». Вона різко повернулася</p>', '2022-07-24 16:00:46', NULL, 18, '<p>«Ми&nbsp;з&nbsp;тобою надто різні!». Вона різко повернулася, і&nbsp;він тепер міг бачити тільки її&nbsp;божественно красивий профіль. «Я&nbsp;йду, і&nbsp;більше ніколи не&nbsp;повернуся». І&nbsp;пішла назавжди&nbsp;— горда, незалежна, нереально гарна у&nbsp;бордовому світлі заходу сонця.</p><p>А&nbsp;потім заграла романтична музика, і&nbsp;на&nbsp;екрані пішли титри. «Я&nbsp;також так зможу,&nbsp;— подумала Ліля, витираючи скупу сльозу. —&nbsp;Він мені робить боляче, і&nbsp;мені давно пора з&nbsp;ним розійтися». Ввечері вона чекала на&nbsp;нього з&nbsp;твердими намірами сказати, що&nbsp;вони розходяться. І&nbsp;що&nbsp;вона йде від нього, зрозуміло, назавжди.</p><p>Додому він повернувся пізно, втомлений і&nbsp;зовсім не&nbsp;налаштований на&nbsp;затяжні задушевні бесіди «про вічне». Ліля прочекала на&nbsp;нього цілий вечір, щоб серйозно поговорити, а&nbsp;тому страшенно хвилювалася і&nbsp;намагалася підібрати прості і&nbsp;водночас красиві слова (як&nbsp;у&nbsp;кіно) про розставання. «Ми&nbsp;з&nbsp;тобою такі різні»,&nbsp;— розпочала Ліля і&nbsp;зрадливий клубок підкотив до&nbsp;горла. Ліля втрачала витримку і&nbsp;холоднокровний тон. «Я&nbsp;голодний як&nbsp;вовк,&nbsp;— здивувався він. —&nbsp;Що&nbsp;на&nbsp;тебе найшло?». «Ми&nbsp;з&nbsp;тобою такі різні,&nbsp;— знову розпочала вона свій монолог, але вже захлинаючись від сліз. —&nbsp;Ти&nbsp;мене не&nbsp;зауважуєш, не&nbsp;цінуєш, і&nbsp;взагалі я&nbsp;у&nbsp;тебе на&nbsp;останньому місці після роботи, друзів, родини, і&nbsp;взагалі… я&nbsp;у&nbsp;тебе після всіх вуличних бомжів».</p><p>Ліля казала правду, однак їй&nbsp;не&nbsp;було від цього легше. Вона так хотіла, щоб він її&nbsp;заспокоїв і&nbsp;пригорнув, а&nbsp;він продовжував мовчати і&nbsp;сидів незворушно. Тоді вона зібрала усю силу і&nbsp;голосно сказала: «Я&nbsp;йду і&nbsp;більше ніколи не&nbsp;повернуся». Але вона нікуди не&nbsp;пішла, бо&nbsp;вони жили у&nbsp;її&nbsp;квартирі. Розвернувся і&nbsp;пішов він…</p><p>Він пішов, а&nbsp;Ліля ридала усю ніч&nbsp;— не&nbsp;горда, не&nbsp;красива, з&nbsp;червоним носом і&nbsp;запухлими від сліз очима. Їй&nbsp;було боляче і&nbsp;страшно, хоча вона розуміла, що&nbsp;вчинила правильно. Бо&nbsp;ж&nbsp;не можна жити з&nbsp;людиною, яка тобою не&nbsp;цікавиться. Так вона поставила крапку на&nbsp;їхніх стосунках вперше…</p>'),
(4, 'Мені 90 років, і я хочу розповісти свою історію', '<p>Євдокія Василівна прожила сильне життя.</p>', '2022-07-24 16:02:20', NULL, 18, '<p>Євдокія Василівна прожила сильне життя. Відчула на собі наслідки голодомору, дитиною пройшла крізь війну й період відбудови, одружилася з чоловіком, якого покохала, народила двох дітей. Стала ветеринаром, тоді лікаркою-технологом, яку досі любить увесь Гадяцький район. Змінила з десяток місць проживання, переїжджаючи за чоловіком, який став прокурором. Пережила втрату двомісячної доньки, батьків, рідних братів, а тоді й чоловіка. І здається, жодного дня не сиділа без роботи, убачаючи в цьому власну силу.&nbsp;Це історія про довге життя, яке, за бажання, можна прожити разом із героїнею.</p>'),
(5, 'Вас ніколи не катували?» Історія Ігоря Козловського про 700 днів у донецьких підвалах', '<p>У січні 2016 року в квартиру Ігоря Козловського</p>', '2022-07-24 16:02:48', NULL, 18, '<p>У січні 2016 року в квартиру Ігоря Козловського* у Донецьку увірвалися бойовики так званої ДНР, які вилучили техніку та документи на житло, а також викрали цінну колекцію антикваріату. У квартирі залишився старший син Ігоря, який понад 20 років лежить зі зламаним хребтом. «Я доглядав його і думав, як вивезти. Для цього потрібне було функціональне ліжко та спеціальна автівка. Я вже планував зробити це, але був заарештований». Згодом «військовий трибунал «ДНР» засудив чоловіка до двох років і восьми місяців ув’язнення. Це історія про жахи перебування у полоні та переживання травми</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(11) DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `access`, `lastname`, `firstname`) VALUES
(15, 'test@1', '220466675e31b9d20c051d5e57974150', 0, 'admin', 'admin'),
(17, 'danilo.savchenko96@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 'Savchenko', 'Danylo'),
(18, 'admin@1', '220466675e31b9d20c051d5e57974150', 1, 'MainAdmin', 'MainAdmin'),
(20, 'dan1ssimo@123', '25d55ad283aa400af464c76d713c07ad', NULL, 'Savchenko', 'Danylo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `difftext`
--
ALTER TABLE `difftext`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `difftext`
--
ALTER TABLE `difftext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
