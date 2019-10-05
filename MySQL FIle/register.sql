-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2019 at 03:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL DEFAULT '4',
  `nomal_price` int(100) DEFAULT NULL,
  `new_price` int(100) DEFAULT NULL,
  `headphone_type` varchar(100) NOT NULL,
  `header` varchar(150) NOT NULL,
  `sub_header` text NOT NULL,
  `header_text` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `thumnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_type`, `nomal_price`, `new_price`, `headphone_type`, `header`, `sub_header`, `header_text`, `title`, `description`, `img`, `thumnail`) VALUES
(14, '3', 33000, 30000, 'Fullsize Headphone', 'GRADO WHITE LIMITED EDITION', 'Inspiration from The White Album', 'หูฟังจากทาง Grado ในรุ่น White Limited เป็นหูฟังรุ่นพิเศษที่ได้แรงบันดาลใจมาจาก The White Album ของวง The Beatles นั่นเองครับ โดยในรุ่นนี้จะมีจะดเด่นอยู่ที่ ear cup สีขาวนั่นเอง', 'รีวิว หูฟัง GradoWhite Limited Edition', 'สำหรับหูฟัง Grado White Limited นั้นจะเป็นหูฟังแบบ full size ครับ โดยขนาดของหูฟังจะใกล้เคียงกับซีรีย์ GS นั่นเอง ซึ่งจุดที่ตัวบอดี้ของหูฟังนั้นจะใช้ไม้เมเปิ้ลสีขาว พร้อมสลักโลโก้แบรนด์ GRADO เอาไว้ครับ โดยการออกแบบตรงส่วนนี้นั้นได้แรงบันดาลใจมาจาก The White Album ของวง The Beatles นั่นเอง ฟองน้ำนั้นจะใช้เป็นขนาดจัมโบ้ที่สวมใส่สบายเป็นพิเศษ ก้านคาดหัวทำจากหนังแท้ มีการบุฟองน้ำภายในเพื่อความสบายในการสวมใส่ สายสัญญาณจะใช้เป็นทองแดงความบริสุทธิ์สูงแบบปราศจากออกซิเจน พร้อมแจ๊คขนาด 3.5 มม. และมีอแดปเตอร์แปลงเป็นขนาด 6.3 มม. มาให้ภายในกล่องครับ', 'option4500_18955_800x600.jpg', '1565087393_zzzIMG_4735.jpg'),
(15, '1', 10990, 7590, 'TrueWireless Headphone', 'SONY WH-H900N', 'พระกาฬอัจริยะ', 'หูฟังจากทาง Sony ในรุ่น WH-H900N เป็นหูฟังไร้สายในซีรีย์ h.ear 2 ซึ่งเป็นซีรีย์ใหม่ครับ ถึงแม้หน้าตาหูฟังนั้นจะเหมือนเดิม แต่ฟังก์ชั่นการใช้งานนั้นมีการปรับปรุงยกใหญ่เลยครับ มาดูกันเลยครับว่ามีอะไรบ้าง', 'รีวิว หูฟังไร้สาย Sony WH-H900N', 'สำหรับหูฟัง Sony WH-XB900 นั้นเป็นหูฟังไร้สายชนิด over ear ครับ โดยเมื่อสวมใส่จะครอบไปทั้งใบหู ช่วยให้สามารถใช้งานได้ยาวนาน ไม่เจ็บหู น้ำหนักอยู่ที่ 254 กรัมซึ่งจัดว่าค่อนข้างเบาสำหรับหูฟังขนาดใหญ่ ฟองน้ำหูฟังมีความหนาปานกลาง เลือกใช้เป็น memory foam หุ้มด้วยหนังเทียม ซึ่งสามารถกันเสียงรบกวนจากภายนอกได้ดี ตัวก้านหูฟังทำจากพลาสติกที่มีความแข็งแรง สามารถยืดหยุ่นได้ในระดับหนึ่ง สามารถพับเก็บได้เพื่อความสะดวกในการพกพา ส่วนปุ่มต่างๆจะอยู่ที่ด้านหลังของ ear cup ฝั่งซ้าย โดยจะมีปุ่ม power และปุ่มสลับ Profile สามารถกดได้ง่ายครับ ภายในกล่องจะมาพร้อมกับ ถุงผ้า, สายหูฟัง และสาย USB สำหรับชาร์จแบตเตอรี่ครับ', 'option3167_12371_800x600.jpg', '1509073256_download (5).jpg'),
(17, '4', 7990, NULL, 'TrueWireless Headphone', 'Sony WH-XB900N', 'เบสหนัก พร้อม Noise Cancelling', 'หูฟังจาก Sony ในรุ่น WH-XB900N เป็นหูฟังที่อยู่ในซีรีย์ EXTRA BASS ซึ่งจะมีเบสที่หนักเป็นพิเศษครับ โดยในรุ่นนี้มาในแบบ over ear ครอบทั้งใบหู พร้อมฟังก์ชั่นระบบตัดเสียงรบกวน Digital Noise Cancelling ครับ', 'รีวิว หูฟังไร้สาย Sony WH-XB900N', 'สำหรับหูฟัง Sony WH-XB900 นั้นเป็นหูฟังไร้สายชนิด over ear ครับ โดยเมื่อสวมใส่จะครอบไปทั้งใบหู ช่วยให้สามารถใช้งานได้ยาวนาน ไม่เจ็บหู น้ำหนักอยู่ที่ 254 กรัมซึ่งจัดว่าค่อนข้างเบาสำหรับหูฟังขนาดใหญ่ ฟองน้ำหูฟังมีความหนาปานกลาง เลือกใช้เป็น memory foam หุ้มด้วยหนังเทียม ซึ่งสามารถกันเสียงรบกวนจากภายนอกได้ดี ตัวก้านหูฟังทำจากพลาสติกที่มีความแข็งแรง สามารถยืดหยุ่นได้ในระดับหนึ่ง สามารถพับเก็บได้เพื่อความสะดวกในการพกพา ส่วนปุ่มต่างๆจะอยู่ที่ด้านหลังของ ear cup ฝั่งซ้าย โดยจะมีปุ่ม power และปุ่มสลับ Profile สามารถกดได้ง่ายครับ ภายในกล่องจะมาพร้อมกับ ถุงผ้า, สายหูฟัง และสาย USB สำหรับชาร์จแบตเตอรี่ครับ', 'option4520_19077_800x600.jpg', '1566359840_zzz51+wJMnG7iL.jpg'),
(18, '1', 14690, 9990, 'Onear Headphone', 'SENNHEISER MOMENTUM 2 OE BT', 'on ear ไร้สายพร้อมระบบตัดเสัยงรบกวน', 'Momentum 2 OE BT นั้นเป็นหูฟังที่ถูกออกแบบมาให้มีขนาดเล็กรองรับการเชื่อมต่อแบบ Bluetooth และมี NFC ที่มาพร้อมกับ NoiseGard ที่ช่วยตัดเสียงรบกวนจากภายนอกได้เป็นอย่างดี\r\n\r\n', 'รีวิว หูฟังไร้สาย Sennheiser Momentum 2 OE BT', 'โดยตัวหูฟังนั้นมีดีไซน์ที่ดูวินเทจให้ความคลาสสิคมาก ๆ โดยตัวโครงนั้นเป็น Stainless Steel ที่ให้ความแข็งแรงทนทาน ส่วนตัวแพดนั้นยังให้ความนุ่มสบายอีกด้วย นอกจากนี้ยังได้ Built-In Microphone สำหรับคุยโทรศัพท์ที่มีระบบ VoiceMax ช่วยให้การสนทนานั้นมีความคมชัดมากยิ่งขึ้นครับ นอกจากนี้ยังสามารถใช้งานต่อเนื่องได้นานถึง \"22 ชั่วโมง\" ต่อการชาร์จไฟเต็ม 1 ครั้ง ซึ่งถือว่าเป็นหูฟังที่มี Battery ที่อึดมาก ๆ อีกรุ่นนึงเลยครับ', 'option2182_7081_800x600.jpg', 'option2182_7082_800x600.jpg'),
(20, '4', 5290, NULL, 'Eadbud Headphone', 'Marshall Minor 2 BT', 'กลับมาครั้งใหม่ ในแบบไร้สาย', 'หูฟังจากทาง Marshallในรุ่น Minor II Bluetooth นั้นเป็นหูฟัง ear buds ที่กลับมาอีกครั้ง โดยในรุ่นนี้เป็นรุ่นที่ต่อยอดมาจาก Minor รุ่นแรกที่มีจุดเด่นในเรื่องความสบายในการสวมใส่นั่นเองครับ', 'รีวิว หูฟังไร้สาย Marshall Minor 2 BT', 'สำหรับหูฟัง Marshall Minor II Bluetooth นั้นเป็นหูฟังแบบ ear buds ครับ ซึ่งในส่วนของท่อนำเสียงนั้นจะเปิดออกด้านข้าง ซึ่งจะพอดีกับช่องหูของเราครับ สวมใส่กระชับ โดยตัวสายหูฟังนั้นออกแบบมาให้เป็น earfin ที่จะทำหน้าที่ค้ำในช่องหูของเรา โดยสามารถปรับความยาวได้ด้วยตัวเอง จึงสามารถใช้งานได้ทุกขนาดใบหู มาพร้อมกับไมโครโฟนและรีโมทบริเวณตัวสายซึ่งมีความพิเศษอยู่ที่ตัวปุ่มนั้นเป็นแบบ multi-directional control knob ที่จะใช้ในการควบคุมทั้งระดับเสียงและการเล่นเพลงในปุ่มเดียวเลยครับ แบตเตอรี่สามารถใช้งานได้นานสูงสุด 12 ชั่วโมงต่อการชาร์จหนึ่งครั้ง โดยชาร์จผ่านช่อง Micro USB บริเวณตัวไมโครโฟนนั่นเอง', 'option4042_16745_800x600.jpg', '1545382749_zzz1010-2b.jpg'),
(21, '4', 12390, NULL, 'Eadbud Headphone', 'Sennheiser Momentum True Wireless', 'พระกาฬไร้สายสัมผัส', 'หูฟังจากทาง Sennheiser ในรุ่น Momentum True Wireless เป็นหูฟังรุ่นแรกของแบรนด์ที่เป็นแบบ True Wireless คือไม่มีสายเชื่อมต่อทั้งสองข้างครับ โดยในรุ่นนี้มีจุดเด่นอยู่ที่การควบคุมด้วยระบบสัมผัสนั่นเองครับ', 'รีวิว หูฟังไร้สาย Sennheiser Momentum True Wireless', ' สำหรับหูฟัง Sennheiser Momentum True Wireless เป็นหูฟังขนาดเล็ก น้ำหนักเบา สวมใส่แบบ in ear ช่วยกันเสียงรบกวนภายนอกได้เป็นอย่างดี ตัวบอดี้มีความโค้งมน โดยออกแบบให้รับกับรูปทรงช่องหู ช่วยให้สวมใส่ได้พอดี ควมคุมด้วยระบบสัมผัส โดยจะเป็นการแตะเพื่อเล่นเพลง, ปรับระดับเสียง, และเรียกใช้ระบบสั่งงานด้วยเสียงครับ มาพร้อมกับกล่องเก็บที่เป็นพลาสติก หุ้มด้วยผ้าอีกหนึ่งชั้น ตัวเคสนั้นจะมีแบตเตอรี่อยู่ภายใน เอาไว้สำหรับเติมพลังงานให้ตัวหูฟังระหว่างวันด้วย ชาร์จแบตเตอรี่ผ่านทาง USB-C ครับ ที่ด้านหลังตัวเคสจะมาพร้อมปุ่มสำหรับเช็คปริมาณแบตเตอรี่คงเหลืออีกด้วย', 'option3992_16547_800x600.jpg', '1543830932_zzzsennheiser-momentum-true-wireless.jpg'),
(25, '4', 3690, NULL, 'Inear Headphone', 'Sennheiser Momentum In-Ear', 'พระกาฬแรงกระตุ้น', 'หูฟัง Sennheiser Momentum In-Ear นั้นเป็นหูฟังอินเอียร์ ขนาดเล็กที่มีบอดีเงางาม ตัวบอดีทรงมน ขนาดเล็กทำให้สวมใส่สบาย ไม่อึดอัดครับ', 'รีวิว หูฟัง Sennheiser Momentum In-Ear', 'สำหรับ Sennheiser Momentum In-Ear นั้นจะมาพร้อมกับตัวสายรูปทรงเเบนหนา ให้ความยืดหยุ่นที่ดี เเข็งเเรง เเถมมีคอนโทรลทอล์ค ที่ช่วยทำให้การควบคุมใช้งานมีความสะดวกคล่องตัวเป็นอย่างดี ส่วนของหัวเเจ็คนั้นออกเเบบให้เป็นลักษณงอ ปลายหัวเรียวเล็ก ช่วยทำให้ใช้งานได้อย่างคล่องตัวไม่ติดเคสครับ ในตัวกล่องนั้นมีกระเป๋ากันกระเเทกเเถมมาให้ใช้งานเเบบครบๆอีกด้วยครับผม', 'option239_613_800x600.jpg', 'sennheiser-momentum-inear-main.jpg'),
(26, '1', 13990, 9490, 'TrueWireless Headphone', 'Sony WH-1000XM3', 'พระกาฬห้ามรบกวน', 'หูฟังจากทาง Sony ในรุ่น WH-1000XM3 เป็นหูฟังไร้สายที่ต่อยอดมาจากรุ่นเดิมครับ โดยในรุ่นนี้ได้มีการเพิ่มชิปประมวลผล QN1 เข้ามาเพื่อประสิทธิภาพในการตัดเสียงรบกวนที่ดียิ่งขึ้นกว่าเดิม', 'รีวิว หูฟังไร้สาย Sony WH-1000XM3', 'สำหรับหูฟัง WH-1000XM3 นั้นเป็นหูฟังชนิด full size ครอบทั้งใบหู สวมใส่สบาย โดยในรุ่นนี้จะมีดีไซน์ที่คล้ายกับรุ่น WH-1000XM2 แต่จะมีขนาดที่เล็กลงเล็กน้อยครับ มีจุดเด่นอยู่ที่การควบคุมด้วยระบบสัมผัส โดยสามารถเพิ่ม-ลดเสียง รวมไปถึงการเล่นเพลงและรับสายโทรศัพท์ด้วยการสัมผัสที่ earcup เท่านั้นครับ นอกจากนี้ตัวหูฟังยังมีระบบ Quick attention ที่เมื่อเราเอามือโอบที่ earcup ตัวหูฟังจะทำการหรี่เพลงลง พร้อมทั้งให้เราได้ยินเสียงรอบตัวได้อย่างชัดเจนโดยที่ไม่ต้องถอดหูฟังเลยล่ะครับ รองรับการเชื่อมต่อทั้งแบบไร้สายและแบบเสียบสาย และภายในกล่องยังแถมเคสทรงกึ่งแข็งสำหรับพกพามาให้ด้วยครับ', 'option3774_15493_800x600.jpg', '1537258806_zzz81nOpVXaO7L.jpg'),
(27, '3', 8990, NULL, 'Eadbud Headphone', 'Sony WF-1000XM3', 'หูฟัง TWS ที่ฟังก์ชั่นเยอะที่สุด', 'หูฟังจากทาง Sony ในรุ่น WF-1000XM3 เป็นหูฟังไร้สายแบบ True Wireless ครับ โดยในรุ่นนี้จะมีการปรับปรุงจากรุ่นแรกแบบยกเครื่องใหม่หมด ทั้งในส่วนของการเชื่อมต่อ การใช้งาน รวมไปถึงการออกแบบอีกด้วยครับ', 'รีวิว หูฟังไร้สาย Sony WF-1000XM3', 'สำหรับหูฟัง Sony WF-1000XM3 นั้นจะเป็นหูฟัง True Wireless แบบ in ear ครับ ตัวหูฟังนั้นจะมีให้เลือก 2 สีด้วยกันได้แก่สีดำ และสีทอง ตัวบอดี้นั้นทำจากพลาสติกแบบด้านที่ช่วยลดรอยนิ้วทือได้เป็นอย่างดี ที่ด้านนอกจะประกอบไปด้วยแถบควบคุมด้วยการสัมผัส ออกแบบมาสำหรับการสั่งงานต่างๆ และไมโครโฟนที่ออกแบบมาสำหรับตัดเสียงรบกวน ส่วนด้านในจะมีไมโครโฟนอีก 1 ตัว, เซ็นเซอร์ตรวจจับการสวมใส่ และกระเปาะที่ออกแบบมาให้สวมใส่ได้อย่างกระชับ โดยไม่ว่าจะเป็นคนที่ใบหูเล็กหรือใหญ่ก็สามารถใส่ได้อย่างพอดีครับ ภายในกล่องจะมาพร้อมกับเคสที่ทำหน้าที่ชาร์จแบตเตอรี่ให้กับตัวหูฟัง โดยตัวเคสจะมี NFC สำหรับช่วยให้การจับคู่หูฟังนั้นสามารถทำได้โดยง่าย, จุกหูฟังที่มีให้เลือก 7 คู่ และสาย USB-C สำหรับชาร์จแบตเตอรี่ให้กับเคสหูฟังครับ\r\n ', 'option4495_18921_800x600.jpg', '1563515576_zzz190706-sony-wf-1000xm3-launch-2.jpg'),
(28, '3', 8900, NULL, 'Eadbud Headphone', 'Beats Powerbeats Pro', 'หูฟัง True Wireless แบบคล้องหู', 'หูฟังจากทาง Beats ในรุ่น Powerbeats Pro นั้นเป็นหูฟังแบบ True Wireless ที่มาพร้อมกับการออกแบบใหม่ และชิป H1 ที่ช่วยเรื่องความเสถียรในการเชื่อมต่อครับ', 'รีวิว หูฟังไร้สาย Beats Powerbeats Pro', 'สำหรับหูฟัง Powerbeats Pro นั้นจะเป็นหูฟังแบบ in ear ที่สวมใส่แบบคล้องใบหูครับ โดยออกแบบมาสำหรับการออกกำลังกาย สวมใส่ได้อยางกระชับ ไม่หลุดแม้จะเคลื่อนไหวแบบหนักหน่วง ตัวหูฟังข้างซ้ายจะมีปุ่มปรับเสียงที่ด้านบน ส่วนด้านนอกบริเวณโลโก้ Beats จะเป็นปุ่มสำหรับควบคุมการเล่นเพลง ส่วนด้านในจะมีเซ็นเซอร์ตรวจจับการสวมใส่ โดยเมื่อถอดหูฟังออกจะหยุดเล่นเพลงอัตโนมัติครับ มาพร้อมกับเคสที่ทำหน้าที่ชาร์จแบตเตอรี่ให้กับหูฟัง ภายในกล่องจะมาพร้อมกับจุกหูฟัง และสาย Lightning ครับ', 'option4559_19286_800x600.jpg', '1563523072_zzzpp-pdp-p6-imgwtext2-lrg.jpg'),
(29, '3', 2190, NULL, 'Eadbud Headphone', 'Havit G1', 'พระกาฬรันนิ่ง', 'หูฟังจากทาง Havit ในรุ่น G1 เป็นหูฟังไร้สายแบบ truly wireless ที่ออกแบบมาสำหรับใช้ในการออกกำลังกาย โดยมีดีไซน์ที่สวมใส่กระชับ ไม่หลุดง่ายครับ', 'รีวิว หูฟังไร้สาย Havit G1', 'สำหรับหูฟัง Havit รุ่น G1 นั้นจะเป็นหูฟังแบบ truly wireless คือไม่มีสายเชื่อมต่อทั้งสองข้างครับ ตัวบอดีผลิตจากพลาสติกที่น้ำหนักเบาแต่ทนทาน มีการเคลือบ rubberize เอาไว้ที่ผิวของตัวหูฟังเพื่อความกระชับ ใช้การเชื่อมต่อผ่านทาง Bluetooth 5.0 ตัวหูฟังนั้นมาพร้อมกับปุ่มข้างละ 1 ปุ่ม สำหรับใช้เล่น/หยุดเพลง, เปลี่ยนเพลง รวมไปถึงกดเรียกใช้ระบบสั่งงานด้วยเสียงอย่าง Siri และ Google Assistant ครับ\r\n ', 'option3798_15613_800x600.jpg', '1538443491_zzzsimple-operation_02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `gender`, `city`, `country`, `user_address`, `user_password`, `role`) VALUES
(26, 'Titiwat', 'Kuarkamphun', 'nikepan4@hotmail.com', '029696331', 'male', 'นนทบุรี', 'Russia', 'ติวานน\r\nซ.เรวดี46/3', 'b314aa11a4ac50c105bf94839653bcb27b39afab2b9155403c76aa8b2a069c385da75419893a880f5f8fc7e4f4914736b88ecce13a92d82ba20605ef233085df', 0),
(27, 'Titiwat', 'Kuarkamphun', 'futayo110@gmail.com', '029696331', 'male', 'นนทบุรี', 'United States', 'ติวานน\r\nซ.เรวดี46/3', 'b314aa11a4ac50c105bf94839653bcb27b39afab2b9155403c76aa8b2a069c385da75419893a880f5f8fc7e4f4914736b88ecce13a92d82ba20605ef233085df', 1),
(28, 'Kitty', 'Housen', 'giggabome@gmail.com', '0944876321', 'female', 'นนทบุรี', 'United States', 'ติวานน\r\nซ.เรวดี46/3', 'b314aa11a4ac50c105bf94839653bcb27b39afab2b9155403c76aa8b2a069c385da75419893a880f5f8fc7e4f4914736b88ecce13a92d82ba20605ef233085df', 1),
(29, 'Triton', 'lovely', 'test@email.com', '0944876321', 'male', 'นนทบุรี', 'United Kingdom', 'ติวานน\r\nซ.เรวดี46/3', 'e909f07705ad21ce41fa2dbaee51a8b4fd302bde995ac979aab16eec9cc989eae8aba07299f95d72838753f43fe6d5eb01d228dc2c19f7f5b0247865a0755b7f', 1),
(30, 'Rosaria', 'Heartman', 'popyface@hotmail.com', '0944876321', 'female', 'นนทบุรี', 'German', 'ติวานน\r\nซ.เรวดี46/3', '732577adc8e18e26fc2ba81c8e3b164ebe91aebf3ecae0568e33c6f54a3d0fca7aef6e86b194dc527c18576deb5cddb38143fcc7de93a0833078aae0cc85315a', 1),
(31, 'TitiwatK', 'Kuarkamphun', 'testemail@gmail.com', '944876321', 'male', 'นนทบุรี', 'Thailand', 'ติวานน\r\nซ.เรวดี46/3', 'bb9ec9970ff02538f219fbd2fe194a1abfea590942e9545746da5e45a4415e4a937f29b89a94c35205d38014aaa704177fcd19d5e7ffcc990398aa44261bc06d', 1),
(32, 'Titiwat', 'Kuarkamphun', 'test2@email.com', '0944876321', 'Male', 'นนทบุรี', 'Thailand', 'lll', '6fb1ligU', 1),
(33, 'Titiwat', 'Kuarkamphun', 'test3@email.com', '944876321', 'male', 'นนทบุรี', 'Thailand', 'ติวานน\r\nซ.เรวดี46/3', 'e909f07705ad21ce41fa2dbaee51a8b4fd302bde995ac979aab16eec9cc989eae8aba07299f95d72838753f43fe6d5eb01d228dc2c19f7f5b0247865a0755b7f', 1),
(34, 'Titiwat', 'Kuarkamphun', 'test4@email.com', '944876321', 'female', 'นนทบุรี', 'Thailand', 'ติวานน\r\nซ.เรวดี46/3', 'e909f07705ad21ce41fa2dbaee51a8b4fd302bde995ac979aab16eec9cc989eae8aba07299f95d72838753f43fe6d5eb01d228dc2c19f7f5b0247865a0755b7f', 1),
(35, 'Titiwat', 'Kuarkamphun', 'test5@email.com', '944876321', 'male', 'นนทบุรี', 'Thailand', 'ติวานน\r\nซ.เรวดี46/3', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`user_id`, `product_id`, `quantity`) VALUES
(26, 18, 5),
(27, 15, 2),
(28, 20, 4),
(30, 15, 2),
(30, 18, 1),
(30, 14, 6),
(30, 25, 1),
(26, 27, 4),
(28, 18, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
