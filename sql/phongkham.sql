-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 04:46 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phongkham`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE IF NOT EXISTS `tbl_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `name`, `phone`, `content`, `status`) VALUES
(2, 'Đặng Hoàng Dịu', '0924723333', 'Cao huyết áp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

DROP TABLE IF EXISTS `tbl_info`;
CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `map` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `name`, `address`, `phone`, `facebook`, `map`) VALUES
(1, 'BSCKI NGÔ HOÀNG HƠN', 'Sóc Trăng', '09853799374', 'https://www.facebook.com/khosimsodepcantho/', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14900.258868040448!2d105.68726623742481!3d20.990042760181517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134541aaaaaaaab:0x46793a183821aa97!2zVHLGsOG7nW5nIHRp4buDdSBo4buNYyBBbiBUaMaw4bujbmcgQQ!5e0!3m2!1svi!2s!4v1548385794334" width="100%" height="450" style="border:0" allowfullscreen></iframe> ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intro`
--

DROP TABLE IF EXISTS `tbl_intro`;
CREATE TABLE IF NOT EXISTS `tbl_intro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `view` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_intro`
--

INSERT INTO `tbl_intro` (`id`, `content`, `view`) VALUES
(1, '<p><span style=\\"color:#FF0000\\"><strong>Chúng tôi luôn có những ưu đãi đặc biệt cho khách hàng thân thiết tại NST Phòng Khám</strong></span></p>\r\n', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `parent` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `parent`, `level`) VALUES
(1, 'Nam Khoa', 0, 1),
(2, 'Phụ Khoa', 0, 1),
(6, 'Tiểu phẩu', 0, 1),
(3, 'Vô Sinh Nữ', 2, 2),
(5, 'Tiểu Phẩu', 3, 1),
(7, 'Chấn thương', 6, 2),
(8, 'AUM YOGA CẦN THƠ', 1, 2),
(9, 'Cổ tay', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `view` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `img`, `content`, `date`, `view`) VALUES
(1, 'Đau bụng dưới bên trái có phải ruột thừa không ?', 'ung-thu-tang.jpg', 'Đau bụng dưới bên trái có phải ruột thừa không ?', '15-12-2019', 101),
(2, 'Đau bụng dưới bên trái có phải ruột thừa không ?', 'ung-thu-tang.jpg', 'Đau bụng dưới bên trái có phải ruột thừa không ?', '15-12-2019', 100),
(3, 'Đau bụng dưới bên trái có phải ruột thừa không ?', 'ung-thu-tang.jpg', 'Đau bụng dưới bên trái có phải ruột thừa không ?', '15-12-2019', 100),
(4, 'Đau bụng dưới bên trái có phải ruột thừa không ?', 'ung-thu-tang.jpg', 'Đau bụng dưới bên trái có phải ruột thừa không ?', '15-12-2019', 105),
(5, 'Đau bụng dưới bên trái có phải ruột thừa không ? erer', 'ung-thu-tang.jpg', '<p>Đau bụng dưới bên trái có phải ruột thừa không ? hhhh</p>\r\n', '19/12/2019 | 22:58:46', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `parent` int(10) NOT NULL,
  `child` int(10) NOT NULL,
  `img` varchar(300) NOT NULL,
  `date` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `view` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `parent`, `child`, `img`, `date`, `content`, `view`) VALUES
(1, 'Điều trị hôi nách bằng Laser hết bao tiền', 1, 3, '34-min-3.jpg', '15-12-2019', 'Đối với những ai mắc bệnh hôi nách , thì vấn đề trị hôi nách bằng laser ', 112),
(2, 'Điều trị hôi nách bằng Laser hết bao tiền', 1, 3, '34-min-3.jpg', '15-12-2019', 'Đối với những ai mắc bệnh hôi nách , thì vấn đề trị hôi nách bằng laser ', 112),
(3, 'Điều trị hôi nách bằng Laser hết bao tiền', 1, 3, '34-min-3.jpg', '15-12-2019', 'Đối với những ai mắc bệnh hôi nách , thì vấn đề trị hôi nách bằng laser ', 113),
(4, 'Điều trị hôi nách bằng Laser hết bao tiền', 2, 3, '34-min-3.jpg', '15-12-2019', 'Đối với những ai mắc bệnh hôi nách , thì vấn đề trị hôi nách bằng laser ', 111),
(5, 'Điều trị hôi nách bằng Laser hết bao tiền', 2, 3, '34-min-3.jpg', '15-12-2019', 'Đối với những ai mắc bệnh hôi nách , thì vấn đề trị hôi nách bằng laser ', 111),
(6, 'Điều trị hôi nách bằng Laser hết bao tiền hả', 5, 9, '34-min-3.jpg', '19/12/2019 | 22:37:43', '<p>Cắt tuyến mồ hôi nách là một trong những tiểu phẫu được tiến hành nhằm mục đích giúp bệnh nhân nhanh chóng thoát khỏi tình trạng hôi nách một cách an toàn và hiệu quả. Đặc biệt, phương pháp này có thể áp dụng được với cả những bệnh nhân có tuyến mồ hôi lớn và sâu bên trong nách. Chính vì vậy, đây đang là một trong những cách chữa hôi nách được nhiều người tin tưởng và mong muốn áp dụng. Tuy nhiên, cắt tuyến mồ hôi nách bao nhiêu tiền? Cắt ở đâu hiệu quả nhất lại là vấn đề khiến cho nhiều người băn khoăn suy nghĩ. Hiểu được điều đó, sau đây các bác sĩ chuyên trang .Org sẽ chia sẻ một số thông tin quan trọng và cần thiết về vấn đề này, giúp mọi người có sự lựa chọn sáng suốt hơn. Hôi nách là một trong những hiện tượng bài tiết bất thường tại tuyến mồ hôi dưới cánh tay. Theo đó, ở dưới da chúng ta luôn có hai tuyến mồ hôi là tuyến mồ hôi lớn và tuyến mồ hôi nhỏ. Nếu tuyến mồ hôi lớn hoạt động quá mức sẽ tiết ra nhiều chất béo và các acid không no. Đây chính là môi trường vô cùng thuận lợi cho vi khuẩn trên bề mặt da hoạt động mạnh. Từ đó, phân hủy và gây mùi hôi khó chịu. Tùy thuộc vào tình trạng cơ thể, hoạt động của tuyến mồ hôi mỗi người mà hiện tượng hôi nách có thể diễn ra nặng nhẹ khác nhau. Hiện nay có khá nhiều giải pháp chữa hôi nách như: Sử dụng nguyên liệu tự nhiên chữa hôi nách, sử dụng thuốc hoặc các loại hóa mỹ phẩm, trị mồ hôi nách bằng tia laser…. Tuy nhiên, những phương pháp này thường chỉ có thể ngăn chặn mùi hôi nhưng không thể trị dứt điểm tình trạng hôi nách. Cắt bỏ tuyến mồ hôi nách là biện pháp điều trị tận gốc mùi hôi khó chịu. Ban đầu, bệnh nhân sẽ được gây tê tại vùng nách. Sau đó, các bác sĩ sẽ hút bỏ mỡ dưới da, nơi chứa các tuyến mồ hôi. Sau đó, đưa dụng cụ y tế chuyên dụng vào để nạo bỏ hoàn toàn tuyến mồ hôi. Sau khi tiến hành tiểu phẫu xong, bệnh nhân có thể bị đau tại vùng nách. Tuy nhiên, cảm giác không quá khó chịu. Đồng thời, kiêng vận động trong vòng 1 tuần để vết thương nhanh lành và tránh để lại sẹo. - Đối với vấn đề cắt tuyến mồ hôi nách giá bao nhiêu tiền? Bác sĩ Trịnh Giang Lợi cho biết: Hiện nay chưa có mức phí cụ thể quy định bệnh nhân phải bỏ ra bao nhiêu tiền để cắt tuyến mồ hôi nách. Bởi số tiền đó phụ thuộc vào nhiều yếu tố, cụ thể như sau: hi</p>\r\n', 125),
(8, 'wewew', 6, 7, '600K_p004.png', '19/12/2019 | 22:47:41', '<p>dsdsd</p>\r\n', 2),
(9, 'AUM YOGA CẦN THƠ', 6, 7, 'Hinh2-sim-so-dep-thai-nguyen.png', '19/12/2019 | 22:48:6', '<p>dfdf</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quession`
--

DROP TABLE IF EXISTS `tbl_quession`;
CREATE TABLE IF NOT EXISTS `tbl_quession` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(300) NOT NULL,
  `view` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quession`
--

INSERT INTO `tbl_quession` (`id`, `title`, `content`, `img`, `view`) VALUES
(1, 'Đau bụng dưới bên trái có phải ruột thừa không ?', '', '', 2),
(2, 'Mang thai 3 tháng đầu cần chú ý gì ?', 'Mang thai 3 tháng đầu cần chú ý gì ?', '', 19),
(3, 'Uống Cafe có làm ngưng kinh nguyệt không ?', 'Mang thai 3 tháng đầu cần chú ý gì ?', '', 10),
(4, 'Uống Cafe có làm ngưng kinh nguyệt không ?', 'Mang thai 3 tháng đầu cần chú ý gì ?', '', 13),
(5, 'Uống Cafe có làm ngưng kinh nguyệt không ?', 'Mang thai 3 tháng đầu cần chú ý gì ?', '', 13),
(6, 'Bao lau co bau', '<p>efefe</p>\r\n', '67783118_701331810309970_441132594868781056_n.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

DROP TABLE IF EXISTS `tbl_slide`;
CREATE TABLE IF NOT EXISTS `tbl_slide` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `src` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`id`, `img`, `src`) VALUES
(1, 'slider_1.jpg', 'http://localhost/phongkham');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uudai`
--

DROP TABLE IF EXISTS `tbl_uudai`;
CREATE TABLE IF NOT EXISTS `tbl_uudai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_uudai`
--

INSERT INTO `tbl_uudai` (`id`, `content`) VALUES
(1, '<p><span style=\\"color:#FF0000\\"><strong>Chúng tôi luôn có những ưu đãi đặc biệt cho khách hàng thân thiết tại NST Phòng Khám</strong></span></p>\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
