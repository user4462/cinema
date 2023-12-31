-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 26, 2023 lúc 03:57 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `film_id` int NOT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `sum_price` double(10,2) NOT NULL DEFAULT '0.00',
  `film_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_giohang_sanpham` (`film_id`),
  KEY `fk_giohang_donhang` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `film_id`, `amount`, `sum_price`, `film_name`, `img`) VALUES
(187, 210, 49, 1, 45.00, 'Bụi đời chợ lớn', '../uploads/1362820103-poster-4.jpg'),
(188, 210, 51, 1, 90.00, 'Dragon Ball', '../uploads/1a.jpg'),
(189, 210, 43, 1, 100.00, '1917', '../uploads/56.jpg'),
(190, 211, 61, 1, 25.00, 'Death Note', '../uploads/61k3qe5zitL.jpg'),
(191, 211, 60, 1, 30.00, 'Captain Tsubasa', '../uploads/fb86d7cb1020d196012fc1856c3ba220.jpg'),
(192, 212, 56, 1, 95.00, 'Avatar', '../uploads/300949949_3467933676771678_7032205094451492865_n.jpg'),
(193, 212, 59, 1, 80.00, 'Yêu em từ cái nhìn đầu tiên', '../uploads/01-1465365026028.jpg'),
(194, 212, 54, 1, 50.00, 'Truy tìm ký ức', '../uploads/product-1.jpg'),
(195, 213, 55, 2, 70.00, 'Fast And Furious 7', '../uploads/fast.jpg'),
(196, 214, 49, 3, 45.00, 'Bụi đời chợ lớn', '../uploads/1362820103-poster-4.jpg'),
(197, 215, 56, 3, 95.00, 'Avatar', '../uploads/300949949_3467933676771678_7032205094451492865_n.jpg'),
(198, 216, 60, 2, 30.00, 'Captain Tsubasa', '../uploads/fb86d7cb1020d196012fc1856c3ba220.jpg'),
(199, 216, 61, 1, 25.00, 'Death Note', '../uploads/61k3qe5zitL.jpg'),
(200, 217, 54, 1, 50.00, 'Truy tìm ký ức', '../uploads/product-1.jpg'),
(201, 218, 53, 2, 130.00, 'Iron Man', '../uploads/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_.jpg'),
(209, 226, 43, 1, 100.00, '1917', '../uploads/56.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `cate_name`) VALUES
(29, 'Hanh Dong'),
(30, 'Tinh Cam'),
(31, 'Hoat Hinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `film_id` int NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_binhluan_taikhoan` (`user_id`),
  KEY `fk_binhluan_sanpham` (`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id`, `film_id`, `date`) VALUES
(20, 'Good', 9, 49, '2023/12/25'),
(21, 'xuat sac', 9, 44, '2023/12/26'),
(22, 'trai nghiem tuyet voi', 9, 56, '2023/12/26'),
(23, 'nen xem nha moi nguoi', 9, 54, '2023/12/26'),
(24, 'coi lai lan hai roi', 9, 54, '2023/12/26'),
(25, 'ghe qua', 9, 62, '2023/12/26'),
(26, 'meeee', 9, 42, '2023/12/26'),
(27, 'nu chinh dep quaaa', 9, 59, '2023/12/26'),
(28, 'muon khoc', 9, 57, '2023/12/26'),
(29, 'dung lay cai gi tao khong the cho!!', 2, 49, '2023/12/26'),
(30, 'nu chinh dep ', 2, 58, '2023/12/26'),
(31, 'nu chinh qua dep', 2, 57, '2023/12/26'),
(32, 'awooo', 2, 51, '2023/12/26'),
(33, 'nhuc cai dau qua', 2, 61, '2023/12/26'),
(35, 'xuat sac', 2, 56, '2023/12/26'),
(36, 'phim hay lam', 2, 44, '2023/12/26'),
(81, 'hay qua', 2, 43, '2023/12/26'),
(82, 'huhu', 9, 51, '2023/12/26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `film_id` int NOT NULL AUTO_INCREMENT,
  `film_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `old_price` double(10,0) NOT NULL DEFAULT '0',
  `price` double(10,0) NOT NULL,
  `cate_id` int NOT NULL,
  `trailer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`film_id`),
  KEY `fk_sanpham_danhmuc` (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`film_id`, `film_name`, `img`, `view`, `old_price`, `price`, `cate_id`, `trailer`, `detail`, `desc`) VALUES
(42, 'Thor: The Dark World ', '../uploads/thor-the-dark-world-crowded-691x1024.jpg', 33, 90, 60, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/npvJ9FTgZbM?si=kinOQZB3dmGizAjQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Alan Taylor</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>112 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2013</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nChris Hemsworth,\r\nNatalie Portman,\r\nTom Hiddleston,\r\nAnthony Hopkins,\r\nStellan Skarsgård,\r\nIdris Elba,\r\nChristopher Eccleston,\r\nAdewale Akinnuoye-Agbaje,\r\nKat Dennings,\r\nRay Stevenson,\r\nZachary Levi,\r\nTadanobu Asano,\r\nJaimie Alexander,\r\nRene Russo</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Thor: The Dark World tiếp tục cuộc phiêu lưu của Thor - con trai Odin, chiến binh Avenger huyền thoại - nhằm giải cứu Trái đất và Chín cõi khi một kẻ thù mới xuất hiện với ý định xâm chiếm cả vũ trụ. Sau khi đã dẹp loạn ở Trái đất trong Thor và The Avengers, vị thần sấm bắt đầu công việc lập lại trật tự trong vũ trụ... nhưng một giống loài cổ xưa dưới sự lãnh đạo của Malekith tàn ác đã tìm cách trở lại để nhấn chìm vũ trụ trong bóng đêm kinh hoàng. Trước một kẻ thù mạnh mẽ tới mức cả Odin lẫn Asgard phải dè chừng, Thor phải tự mình dấn thân vào cuộc phiêu lưu nguy hiểm nhất từ trước tới giờ, cuộc phiêu lưu sẽ giúp anh tái hợp với Jane Foster, nhưng cũng đồng thời buộc Thor phải hi sinh gần như tất cả để giải cứu vũ trụ.'),
(43, '1917', '../uploads/56.jpg', 182, 140, 100, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YqNYrYUiMfg?si=5s7cd4IzM1zscLcL\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Sam Mendes</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>119 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2019</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Anh Quốc, Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nGeorge MacKay,\r\nDean-Charles Chapman,\r\nMark Strong,\r\nAndrew Scott,\r\nRichard Madden,\r\nClaire Duburcq,\r\nColin Firth,\r\nBenedict Cumberbatch</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Ngày 6 tháng 4 năm 1917. Là một trung đoàn lắp ráp chiến tranh sâu sắc trong lãnh thổ của kẻ thù, hai người lính được chỉ định chạy đua với thời gian và đưa ra một thông điệp sẽ ngăn chặn 1.600 người đàn ông đi thẳng vào một cái bẫy chết người.'),
(44, 'The Dark Knight', '../uploads/carousel-2.jpg', 50, 160, 120, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LDG9bisJEaI?si=EwPI2y90UbaolPTr\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Sam Mendes</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>119 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2019</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Anh Quốc, Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nGeorge MacKay,\r\nDean-Charles Chapman,\r\nMark Strong,\r\nAndrew Scott,\r\nRichard Madden,\r\nClaire Duburcq,\r\nColin Firth,\r\nBenedict Cumberbatch</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Kị Sĩ Bóng Đêm mở đầu bằng cuộc oanh tạc của Joker tại ngân hàng thành phố Gotham. Hắn gài bẫy nhóm cướp và rời đi một mình cùng số tiền khổng lồ. Trong khi đó, Batman, công tố viên Harvey Dent cùng ủy viên James Gordon liên minh và đưa ra sắc lệnh chống tội phạm trong thành phố. Tuy nhiên, Joker với tính cách điên loạn vẫn không dừng lại, hắn bắt đầu thâu tóm các băng đảng tội phạm và gây ra các cuộc thanh trừng người vô tội để vạch trần danh tính Batman, từng bước đẩy người hùng bóng đêm và các cộng sự vào những cái bẫy vô cùng tinh vi.'),
(49, 'Bụi đời chợ lớn', '../uploads/1362820103-poster-4.jpg', 736, 50, 45, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b9pw1sdwyYs?si=EIBpWE5vqN9RPLzn\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Charlie Nguyễn</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>87 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Việt</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2013</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Việt Nam</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>Johnny Trí Nguyễn, Hoàng Phúc, Hà Hiền, Long Điền, Huỳnh Bích Phương ,Nhung Kate,Thanh Trúc, Hoàng Phi</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Phim xoay quanh mối quan hệ phức tạp giữa 4 nhân vật chính là Hùng Chợ Lớn, Tài Nhớt,  Phong Bụi và Lâm. Lâm là em trai Hùng, vì quá si mê Hương - người tình của Tài Nhớt nên đã đắc tội với gã đối thủ máu lạnh. Vốn đã có âm mưu chiếm lấy Chợ Lớn nên nhân cơ hội này Tài Nhớt buộc Hùng phải đối đầu với mình. Để tăng thêm phần thắng, hắn đã tìm mọi cách khiến cho Phong Bụi - một cao thủ ẩn mình mà y luôn xem như anh em phải quay trở lại giúp y đánh bại Hùng. Và cuộc chiến đã nổ ra giữa 2 nhóm Tài Nhớt - Hùng Chợ Lớn với những trận đấu sinh tử một mất một còn...'),
(51, 'Dragon Ball', '../uploads/1a.jpg', 37, 110, 90, 31, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wHAaKXtfSOg?si=bwjMJCl1U5_QvOXT\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Tetsuro Kodama</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>100 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Nhật</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2022</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Nhật Bản</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>Masako Nozawa, Toshio Furukawa, Yūko Minaguchi, Ryō Horikawa, Mayumi Tanaka, Aya Hisakawa, Takeshi Kusao, Miki Itō,...</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Đội quân Ruy Băng Đỏ đã bị Son Goku tiêu diệt. Thế nhưng, những kẻ kế nghiệp của chúng đã tạo ra hai chiến binh Android mới là Gamma 1 và Gamma 2. Hai Android này tự nhận mình là “Siêu anh hùng”. Chúng bắt đầu tấn công Piccolo và Gohan… Mục tiêu của Đội quân Ruy Băng Đỏ mới này là gì? Trước nguy cơ cận kề, đã đến lúc các siêu anh hùng thực thụ phải thức tỉnh!'),
(53, 'Iron Man', '../uploads/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_.jpg', 7, 200, 130, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8ugaeA-nMTc?si=a-dM2P-Gv2wRLZVB\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Jon Favreau</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>119 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                               </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2008</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nRobert Downey Jr.,\r\nTerrence Howard,\r\nJeff Bridges,\r\nLeslie Bibb,\r\nShaun Toub,\r\nGwyneth Paltrow</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Trong phim Người Sắt, Tony Stark vừa là chủ tập đoàn công nghệ, vừa là một tay chơi kỳ dị. Trong chuyến thị sát Afghanistan, ông bị nhóm khủng bố bắt cóc. Chúng đòi Tony chế tạo thứ vũ khí hủy diệt để tấn công nước Mỹ. Xem phim này bạn sẽ thấy nhận ra sự thật phũ phàng rằng, những vũ khí do mình chế tạo đang quay ngược lại tấn công chính mình, Tony bắt tay chế tạo bộ giáp công nghệ cao. Tẩu thoát khỏi nơi giam cầm, Tony trở thành đại diện công lý dưới biệt danh Người sắt. Trong khi đó, người đồng sự trong tập đoàn Stark âm mưu lật đổ Tony. Liệu âm mưu này có thành công?'),
(54, 'Truy tìm ký ức', '../uploads/product-1.jpg', 24, 70, 50, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GljhR5rk5eY?si=QSWcOra64J2mNMSU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Len Wiseman</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>130 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2012</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nColin Farrell,\r\nKate Beckinsale,\r\nJessica Biel,\r\nBryan Cranston,\r\nJohn Cho,\r\nBill Nighy</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Một công nhân nhà máy, Douglas Quaid, bắt đầu nghi ngờ rằng anh ta là gián điệp sau khi đến thăm Rekall - một công ty cung cấp cho khách hàng của mình những ký ức giả được cấy ghép về cuộc sống mà họ muốn có - gặp trục trặc và anh ta thấy mình đang chạy trốn.'),
(55, 'Fast And Furious 7', '../uploads/fast.jpg', 2, 100, 70, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CCo9DG59yXM?si=jNWThqRnUz5VVwqc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>	James Wan</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>137 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2015</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nVin Diesel,\r\nPaul Walker,\r\nDwayne Johnson,\r\nMichelle Rodriguez,\r\nJordana Brewster,\r\nTyrese Gibson,\r\nChris Bridges,\r\nTony Jaa,\r\nLucas Black,\r\nJason Statham</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Ở cuối phần trước, tưởng chừng như mọi chuyện đã kết thúc, và mở ra một cuộc sống bình lặng, khi cả nhóm đã tiêu diệt được Owen Shaw. Thì trong phần này, sự xuất hiện của Deckard Shaw, người đã giết chết Han và khiêu chiến với Dominic Toretto để trả thù cho em trai Owen Shaw của mình hắn đã làm thay đổi tất cả khiến cho cuộc đụng độ giữa 2 băng nhóm lên đến đỉnh điểm...'),
(56, 'Avatar', '../uploads/300949949_3467933676771678_7032205094451492865_n.jpg', 37, 150, 95, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gq2xKJXYZ80?si=Qvhw7BQWygTzYN6b\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>	James Cameron</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>192 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2019</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nSam Worthington,\r\nZoe Saldaña,\r\nSigourney Weaver,\r\nStephen Lang,\r\nCliff Curtis,\r\nJoel David Moore,\r\nCCH Pounder,\r\nGiovanni Ribisi,\r\nEdie Falco,\r\nJemaine Clement,\r\nKate Winslet</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Hai nhân vật chính, Jake Sully và Neytiri, giờ đã thành đôi, nguyện sẽ ở bên nhau. Tuy nhiên, cả hai buộc phải rời khỏi nhà và khám phá những miền đất mới trên mặt trăng Pandora, cũng chính là lúc những mối nguy cũ trở lại với họ.'),
(57, 'Titanic', '../uploads/titantic-hair-poster_07.jpg', 6, 200, 160, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/I7c1etV7D7g?si=TvtYrjZG8RlREtt0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>	James Cameron</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>119 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Anh</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2012</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Hoa Kỳ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nLeonardo DiCaprio,\r\nKate Winslet,\r\nBilly Zane,\r\nKathy Bates,\r\nFrances Fisher,\r\nBernard Hill,\r\nJonathan Hyde,\r\nDanny Nucci,\r\nGloria Stuart,\r\nDavid Warner,\r\nVictor Garber,\r\nSuzy Amis,\r\nBernard Fox,\r\nBill Paxton</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Là một bộ phim thuộc hàng kinh điển của Hollywood, bộ phim kể về một chuyện tình thật đẹp thật lãng mạn trên chiếc thuyền dành cho quý tộc, chuyện tình giữa một nàng tiểu thư giới thượng lưu cùng chàng trai nghèo khổ.Phim kể về chiếc tàu mang tên Titanic, con tàu mà đối với nhiều người lúc đó thì nó không thể nào có thể chìm được.Nhưng vì quá chủ quan vùn với thiết kế quá sai lầm nên chiếc tàu đã đâm vào tảng băng trôi trên vùng Đại Tây Dương cùng với đó là hàng nghìn người chết và chôn vùi khối tài sản khổng lồ dưới lòng đại dương.Bộ phim được dựng lại từ lời kể của một người đàm bà còn sống sót sau vụ tai nạn nói trên, một nhân chứng sống của một sự kiện lịch sử nhân loại.'),
(58, 'Goodbye My Princess', '../uploads/vk1MYxqBvRMuUhVhORhSSEQ4Zj7.jpg', 6, 70, 50, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hsy9LS6Zl9c?si=p3jHhtlNKybEBMmE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>	Lý Mộc Qua</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>48phút/tập</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Trung</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2019</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Trung Quốc</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nTrần Tinh Húc, Bành Tiêu Nhiễm, Ngụy Thiên Tường, Tư Cầm Cao Oa, La Gia Lương, Dương Cung Như, Vương Chí Phi, Trương Định Hàm</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Không thể nhớ lại tình yêu từng dành cho nhau, thái tử Lý Thừa Ngân và công chúa Tiểu Phong tái hợp qua cuộc hôn nhân chính trị và đương đầu với mưu đồ nơi cung cấm.'),
(59, 'Yêu em từ cái nhìn đầu tiên', '../uploads/01-1465365026028.jpg', 6, 100, 80, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lxnxZCq1At0?si=NqdScwCz8NSgJfLZ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>	Lâm Ngọc Phân</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>45phút/tập</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Quan Thoại</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2016</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Trung Quốc</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nTrịnh Sảng,\r\nDương Dương,\r\nMao Hiểu Đồng,\r\nBạch Vũ,\r\nTrương Hách,\r\nTần Ngữ,\r\nTrương Bân Bân,\r\nTrịnh Nghiệp Thành,\r\nNgưu Tuấn Phong,\r\nTống Hân Giai Di,\r\nMã Xuân Thụy,\r\nThôi Hàng</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Một cô sinh viên khoa công nghệ thông tin vừa bị anh chồng trong game \"đá\". Thế nhưng ngay sau vụ ly hôn này, cô đã nhận được lời cầu hôn từ đệ nhất cao thủ trong game.'),
(60, 'Captain Tsubasa', '../uploads/fb86d7cb1020d196012fc1856c3ba220.jpg', 3, 60, 30, 31, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sh_2raKxEbw?si=uCmV9O4GSP2KPl-R\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Toshiyuki Kato</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>24phút/tập</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Đang cập nhật</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Nhật</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2018</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Nhật Bản</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nYuko Sanpei, Kenichi Suzumura, Ayaka Fukuhara, Mutsumi Tamura, Takuya Sato</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Chuyển thể từ manga cùng tên của tác giả Takahashi Yōichi. Chuyện phim thần đồng bóng đá 11 tuổi Ozora Tsubasa – người đã được huấn luyện viên Roberto thừa nhận tài năng. Tsubasa đi theo Roberto đến Brazil để học tập và chuẩn bị cho World Cup với ấp ủ ước mơ được thi đấu cho Đội tuyển bóng đá quốc gia Nhật Bản và giành chức vô địch Giải vô địch bóng đá thế giới. Khi chuyển tới Nankatsu, Tsubasa kết bạn với Ishizaki Ryou, một cậu bé bằng tuổi cũng yêu thích bóng đá, Wakabayashi Genzo, thủ môn tài năng của đội bóng trường Shutetsu và Sanae (hay Anego), cô bé trưởng nhóm cổ động viên của Nankatsu…'),
(61, 'Death Note', '../uploads/61k3qe5zitL.jpg', 4, 70, 25, 31, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NlJZ-YgAt-c?si=jKBd2E4dJe76TeHL\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Araki Tetsurou</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>22phút/tập</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Nhật</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2006</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Nhật Bản</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nMiyano Mamoru, Yamaguchi Kappei, Nakamura Shido, Hirano Aya, Kudo Haruka, Satou Ai, Watanabe Akeno, Ishikawa Hideo, Takahashi Hiroki, Uchida Naoya</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Light Yagami là một học sinh xuất sắc, có nhiều triển vọng - và đang cảm thấy cuộc sống thật sự nhàm chán. Thế nhưng tất cả đều thay đổi khi cậu tìm thấy Death Note, cuốn sổ được một thần chết cố ý đánh rơi dọc đường. Bất cứ ai bị viết tên vào quyển sổ đều phải chết, và giờ đây Light đã thề rằng sẽ sử dụng sức mạnh của để loại bỏ thế giới tội ác. Nhưng khi những tên tội phạm bất ngờ bỏ mạng hàng loạt, những người có thẩm quyền đã gửi đến thám tử huyền thoại L để theo dấu hòng bắt được kẻ sát nhân. Với L theo sát gót, liệu Light có thể tiếp tục theo đuổi mục đích của cả cuộc đời mình?'),
(62, 'Người bất tử', '../uploads/nguoibattu.jpg', 27, 90, 40, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6VEVPtFDN_U?si=mHJDohp3UO91ExgU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<table class=\"table\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <th style=\"width: 150px;\"></th>\r\n                                    <td></td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th>Đạo diễn:</th>\r\n                                    <td>Victor Vũ</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Thời lượng: </th>\r\n                                    <td>130 phút</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Tình trạng: </th>\r\n                                    <td>Hoàn tất</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Ngôn ngữ: </th>\r\n                                    <td>Tiếng Việt</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Công chiếu: </th>\r\n                                    <td>2018</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Quốc gia: </th>\r\n                                    <td>Việt Nam</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <th scope=\"row\">Diễn viên: </th>\r\n                                    <td>	\r\nQuách Ngọc Ngoan, Jun Vũ, Đinh Ngọc Diệp, Nguyễn Thanh Tú</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>', 'Nội dung phim xoay quanh cuộc đời đầy biến cố của một người đàn ông. Những giấc mơ khó hiểu dẫn dụ cô gái An ở thời hiện đại tìm đến hang động kì bí và phát hiện ra bí mật khủng khiếp của Hùng - một người đàn ông đã sống qua 3 thế kỷ. Làm thế nào để trở thành người bất tử? Cuộc đời thăng trầm đầy tham vọng, thù hận và ma thuật của Hùng dần được kể lại…');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `pttt` tinyint(1) NOT NULL DEFAULT '1',
  `date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donhang_taikhoan` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `total`, `pttt`, `date`, `user_id`, `user_name`, `address`, `email`, `tel`) VALUES
(210, 'aba993411', 235.00, 1, '2023/12/25', 9, 'thanh uyen', 'tan quy, quan7', 'tu@gmail', '123456789'),
(211, 'aba599896', 55.00, 1, '2023/12/25', 9, 'thanh uyen', 'thu duc', 'tu@gmail', '123456789'),
(212, 'aba444279', 225.00, 1, '2023/12/25', 9, 'thanh uyen', 'quan 2, hcm', 'tu@gmail', '123456789'),
(213, 'aba462883', 140.00, 1, '2023/12/25', 9, 'thanh uyen', 'thu duc', 'tu@gmail', '123456789'),
(214, 'aba672692', 135.00, 1, '2023/11/26', 2, 'kien khong', 'ly thuong kiet, q11', 'nguoianhhung@gmail.com', '123123123'),
(215, 'aba208714', 285.00, 1, '2023/11/26', 2, 'kien khong', 'tan quy, quan7', 'nguoianhhung@gmail.com', '123456123'),
(216, 'aba7258', 85.00, 1, '2023/11/26', 2, 'kien khong', 'dao tri, quan 7', 'nguoianhhung@gmail.com', '123123123'),
(217, 'aba882465', 50.00, 2, '2023/10/26', 2, 'kien khong', 'thu duc', 'nguoianhhung@gmail.com', '123123123'),
(218, 'aba747128', 260.00, 3, '2023/10/26', 2, 'kien khong', 'quan 2, hcm', 'nguoianhhung@gmail.com', '123123123'),
(226, 'aba711565', 100.00, 1, '2023/12/26', 9, 'khoa', 'phu my', 'daikhivanthanh@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `user`, `pass`, `role`) VALUES
(0, 'khachhang', NULL, NULL, '', '', 0),
(1, 'admin', 'stu', 'admin@gmail.com', 'admin', '123', 1),
(2, 'nguyen khoa ', 'tan phu dong, sa dec', 'nguoianhhung@gmail.com', 'khoa', '456', 0),
(9, 'thanh uyen', 'tan khanh dong, sd, dt', 'tu@gmail', 'tu', '111', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_giohang_donhang` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_binhluan_taikhoan` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_donhang_taikhoan` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
