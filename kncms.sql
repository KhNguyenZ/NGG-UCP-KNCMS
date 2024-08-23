/*
 Navicat Premium Data Transfer

 Source Server         : 103.200.23.222
 Source Server Type    : MySQL
 Source Server Version : 100339 (10.3.39-MariaDB-cll-lve)
 Source Host           : 103.200.23.222:3306
 Source Schema         : gsampvn1_ucp

 Target Server Type    : MySQL
 Target Server Version : 100339 (10.3.39-MariaDB-cll-lve)
 File Encoding         : 65001

 Date: 13/08/2023 01:37:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kncms_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `kncms_admin_log`;
CREATE TABLE `kncms_admin_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_admin_log
-- ----------------------------
INSERT INTO `kncms_admin_log` VALUES (4, 'Tài khoản Swagg đã được xác nhận bởi Khoi_Nguyen', 'Khoi_Nguyen', '2023-03-01 12:16:59', 1);
INSERT INTO `kncms_admin_log` VALUES (5, 'Tài khoản Khoi_Nguyenzz đã bị từ chối bởi Khoi_Nguyen', 'Khoi_Nguyen', '2023-03-01 12:19:59', 0);
INSERT INTO `kncms_admin_log` VALUES (6, 'Tài khoản Thanh_Liem đã bị từ chối bởi Khoi_Nguyen', 'Khoi_Nguyen', '2023-03-01 04:53:59', 0);

-- ----------------------------
-- Table structure for kncms_chats
-- ----------------------------
DROP TABLE IF EXISTS `kncms_chats`;
CREATE TABLE `kncms_chats`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_chats
-- ----------------------------
INSERT INTO `kncms_chats` VALUES (18, 'cc', '12:40', 'Khoi_Nguyenz');
INSERT INTO `kncms_chats` VALUES (19, 'chao cau nha', '12:42', 'Khoi_Nguyenz');
INSERT INTO `kncms_chats` VALUES (20, 'LOCAL', '02:20', 'Khoi_Nguyenz');
INSERT INTO `kncms_chats` VALUES (21, 'hi', '10:36', 'Khoi_Nguyenz');
INSERT INTO `kncms_chats` VALUES (22, 'cmm', '10:38', 'Khoi_Nguyenz');

-- ----------------------------
-- Table structure for kncms_danhmuc
-- ----------------------------
DROP TABLE IF EXISTS `kncms_danhmuc`;
CREATE TABLE `kncms_danhmuc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_danhmuc
-- ----------------------------
INSERT INTO `kncms_danhmuc` VALUES (1, 'Danh Muc 1', 'danh-muc-1');

-- ----------------------------
-- Table structure for kncms_giftcode
-- ----------------------------
DROP TABLE IF EXISTS `kncms_giftcode`;
CREATE TABLE `kncms_giftcode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `giftcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `open` int NULL DEFAULT 1,
  `limit` int NULL DEFAULT -1,
  `giftname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_giftcode
-- ----------------------------
INSERT INTO `kncms_giftcode` VALUES (1, 'adminz', 1, 'Coins', 10000, 1, 9, 'Coin');

-- ----------------------------
-- Table structure for kncms_item
-- ----------------------------
DROP TABLE IF EXISTS `kncms_item`;
CREATE TABLE `kncms_item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_item
-- ----------------------------
INSERT INTO `kncms_item` VALUES (1, 'Boombox', 'Boombox', 1000, 9, 'https://files.prineside.com/gtasa_samp_model_id/blue/2226_b.jpg', 'boombox');

-- ----------------------------
-- Table structure for kncms_log
-- ----------------------------
DROP TABLE IF EXISTS `kncms_log`;
CREATE TABLE `kncms_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `log` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uid` int NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 130 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_log
-- ----------------------------
INSERT INTO `kncms_log` VALUES (1, 'bạn đã đăng nhập thành công', 586, '24-01-2023 04:31:23');
INSERT INTO `kncms_log` VALUES (29, 'bạn đã đăng nhập thành công', 586, '01-02-2023 10:59:31');
INSERT INTO `kncms_log` VALUES (30, 'admin | cộng tiền thành công', 586, '02-02-2023 01:05:32');
INSERT INTO `kncms_log` VALUES (31, 'admin | cộng tiền thành công', 586, '02-02-2023 01:05:32');
INSERT INTO `kncms_log` VALUES (32, 'admin | cộng tiền thành công - 100000 coin', 586, '02-02-2023 01:08:32');
INSERT INTO `kncms_log` VALUES (33, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:24:32');
INSERT INTO `kncms_log` VALUES (34, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:26:32');
INSERT INTO `kncms_log` VALUES (35, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:27:32');
INSERT INTO `kncms_log` VALUES (36, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:28:32');
INSERT INTO `kncms_log` VALUES (37, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:30:32');
INSERT INTO `kncms_log` VALUES (38, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:36:32');
INSERT INTO `kncms_log` VALUES (39, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:38:32');
INSERT INTO `kncms_log` VALUES (40, 'bạn đã nhập code admin thành công', 586, '02-02-2023 01:39:32');
INSERT INTO `kncms_log` VALUES (41, 'bạn đã mua chiếc thoi-trang-1 thành công', 586, '03-02-2023 10:52:33');
INSERT INTO `kncms_log` VALUES (42, 'bạn đã đăng nhập thành công', 586, '19-02-2023 12:18:49');
INSERT INTO `kncms_log` VALUES (43, 'bạn đã đăng nhập thành công', 624, '19-02-2023 12:22:49');
INSERT INTO `kncms_log` VALUES (44, 'Bạn đã đăng nhập thành công', 586, '19-02-2023 12:40:49');
INSERT INTO `kncms_log` VALUES (45, 'Bạn đã nạp thành công 560 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (46, 'Bạn đã nạp thành công 560 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (47, 'Bạn đã nạp thành công 9000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (48, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (49, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (50, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (51, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (52, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (53, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (54, 'Bạn đã nạp thành công 5000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (55, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (56, 'Bạn đã nạp thành công 560 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (57, 'Bạn đã nạp thành công 9000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (58, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (59, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (60, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (61, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (62, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (63, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (64, 'Bạn đã nạp thành công 5000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (65, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:25:49');
INSERT INTO `kncms_log` VALUES (66, 'Bạn đã nạp thành công 560 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (67, 'Bạn đã nạp thành công 9000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (68, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (69, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (70, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (71, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (72, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (73, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (74, 'Bạn đã nạp thành công 5000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (75, 'Bạn đã nạp thành công 1000 vào tài khoản thông qua MOMO', 586, '19-02-2023 01:33:49');
INSERT INTO `kncms_log` VALUES (76, 'Bạn đã đăng ký tài khoản thành công', 2314, '21-02-2023 01:28:51');
INSERT INTO `kncms_log` VALUES (77, 'Bạn đã đăng ký tài khoản thành công', 2315, '21-02-2023 01:32:51');
INSERT INTO `kncms_log` VALUES (78, 'Bạn đã đăng nhập thành công', 2315, '21-02-2023 01:35:51');
INSERT INTO `kncms_log` VALUES (79, 'Bạn đã đăng nhập thành công', 2315, '21-02-2023 01:45:51');
INSERT INTO `kncms_log` VALUES (80, 'Bạn đã đăng nhập thành công', 2315, '21-02-2023 05:11:51');
INSERT INTO `kncms_log` VALUES (81, 'Bạn đã đăng nhập thành công', 2315, '21-02-2023 10:04:51');
INSERT INTO `kncms_log` VALUES (82, 'Bạn đã nạp thành công 560 vào tài khoản thông qua MOMO', 2315, '21-02-2023 11:10:51');
INSERT INTO `kncms_log` VALUES (83, 'Bạn đã đăng nhập thành công', 2315, '22-02-2023 05:02:52');
INSERT INTO `kncms_log` VALUES (84, 'Bạn đã nhập code adminz thành công', 2315, '22-02-2023 10:23:52');
INSERT INTO `kncms_log` VALUES (85, 'Bạn đã mua chiếc Bobcat thành công', 0, '23-02-2023 11:48:53');
INSERT INTO `kncms_log` VALUES (86, 'Bạn đã mua chiếc Bobcat thành công', 0, '23-02-2023 11:48:53');
INSERT INTO `kncms_log` VALUES (87, 'Bạn đã mua chiếc Bobcat thành công', 2315, '23-02-2023 11:50:53');
INSERT INTO `kncms_log` VALUES (88, 'Bạn đã mua chiếc Bobcat thành công', 2315, '23-02-2023 11:51:53');
INSERT INTO `kncms_log` VALUES (89, 'Bạn đã mua chiếc Bobcat thành công', 2315, '23-02-2023 11:52:53');
INSERT INTO `kncms_log` VALUES (90, 'Bạn đã mua chiếc NRG-500 thành công', 2315, '23-02-2023 12:50:53');
INSERT INTO `kncms_log` VALUES (91, 'Bạn đã mua chiếc Maver thành công', 2315, '23-02-2023 12:53:53');
INSERT INTO `kncms_log` VALUES (92, 'Bạn đã mua chiếc Kinh thành công', 0, '23-02-2023 01:25:53');
INSERT INTO `kncms_log` VALUES (93, 'Bạn đã mua chiếc Kinh thành công', 2315, '23-02-2023 01:25:53');
INSERT INTO `kncms_log` VALUES (94, 'Bạn đã đăng nhập thành công', 2315, '23-02-2023 10:16:53');
INSERT INTO `kncms_log` VALUES (95, 'Bạn đã mua chiếc Bobcat thành công', 2315, '23-02-2023 10:47:53');
INSERT INTO `kncms_log` VALUES (96, 'Admin | Cộng tiền thành công - 1000 SAD', 2315, '23-02-2023 10:59:53');
INSERT INTO `kncms_log` VALUES (97, 'Admin | Trừ tiềnbank thành công - 1000 SAD', 2315, '23-02-2023 10:59:53');
INSERT INTO `kncms_log` VALUES (98, 'Admin | Cộng tiền thành công - 1000 Coin', 2315, '23-02-2023 11:00:53');
INSERT INTO `kncms_log` VALUES (99, 'Admin | Trừ Credits thành công - 1000 Coin', 2315, '23-02-2023 11:00:53');
INSERT INTO `kncms_log` VALUES (100, 'Admin | Cộng tiềnbank thành công - 1000 SAD', 2315, '23-02-2023 11:00:53');
INSERT INTO `kncms_log` VALUES (101, 'Admin | Trừ tiềnbank thành công - 1000 SAD', 2315, '23-02-2023 11:01:53');
INSERT INTO `kncms_log` VALUES (102, 'Admin | Cộng tiền thành công - 10000 Coin', 2315, '24-02-2023 01:25:54');
INSERT INTO `kncms_log` VALUES (103, 'Admin | Cộng tiền thành công - 10200 Coin', 2315, '24-02-2023 01:27:54');
INSERT INTO `kncms_log` VALUES (104, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 11:54:55');
INSERT INTO `kncms_log` VALUES (105, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 11:58:55');
INSERT INTO `kncms_log` VALUES (106, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 11:59:55');
INSERT INTO `kncms_log` VALUES (107, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:01:55');
INSERT INTO `kncms_log` VALUES (108, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:02:55');
INSERT INTO `kncms_log` VALUES (109, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:14:55');
INSERT INTO `kncms_log` VALUES (110, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:17:55');
INSERT INTO `kncms_log` VALUES (111, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:18:55');
INSERT INTO `kncms_log` VALUES (112, 'Bạn đã đăng nhập thành công', 2315, '25-02-2023 12:19:55');
INSERT INTO `kncms_log` VALUES (113, 'Bạn đã đổi tên thành công', 2315, '25-02-2023 12:25:55');
INSERT INTO `kncms_log` VALUES (114, 'Bạn đã đăng nhập thành công', 2315, '26-02-2023 09:44:56');
INSERT INTO `kncms_log` VALUES (115, 'Bạn đã đăng ký tài khoản thành công', 2316, '26-02-2023 10:18:56');
INSERT INTO `kncms_log` VALUES (116, 'Admin | Cập nhật thông tin thành công ', 2315, '26-02-2023 10:40:56');
INSERT INTO `kncms_log` VALUES (117, 'Bạn đã đăng nhập thành công', 2315, '27-02-2023 01:01:57');
INSERT INTO `kncms_log` VALUES (118, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 09:56:57');
INSERT INTO `kncms_log` VALUES (119, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 09:58:57');
INSERT INTO `kncms_log` VALUES (120, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 09:58:57');
INSERT INTO `kncms_log` VALUES (121, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 09:59:57');
INSERT INTO `kncms_log` VALUES (122, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 10:00:57');
INSERT INTO `kncms_log` VALUES (123, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 10:01:57');
INSERT INTO `kncms_log` VALUES (124, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 10:01:57');
INSERT INTO `kncms_log` VALUES (125, 'Bạn đã đổi tên thành công', 2315, '27-02-2023 10:19:57');
INSERT INTO `kncms_log` VALUES (126, 'Admin | Cộng tiền thành công - 10000 Coin', 2315, '28-02-2023 10:15:58');
INSERT INTO `kncms_log` VALUES (127, 'Bạn đã đăng nhập thành công', 2315, '01-03-2023 12:02:59');
INSERT INTO `kncms_log` VALUES (128, 'Bạn đã đăng ký tài khoản thành công', 502, '13-08-2023 12:14:224');
INSERT INTO `kncms_log` VALUES (129, 'Admin | Cộng tiền thành công - 1000000 Coin', 502, '13-08-2023 12:40:224');

-- ----------------------------
-- Table structure for kncms_log_gift
-- ----------------------------
DROP TABLE IF EXISTS `kncms_log_gift`;
CREATE TABLE `kncms_log_gift`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `gift_id` int NULL DEFAULT NULL,
  `uid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_log_gift
-- ----------------------------
INSERT INTO `kncms_log_gift` VALUES (1, 0, 586);
INSERT INTO `kncms_log_gift` VALUES (2, 1, 2315);

-- ----------------------------
-- Table structure for kncms_log_rename
-- ----------------------------
DROP TABLE IF EXISTS `kncms_log_rename`;
CREATE TABLE `kncms_log_rename`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cur_coins` int NULL DEFAULT NULL,
  `new_coins` int NULL DEFAULT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `curname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `newname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_log_rename
-- ----------------------------
INSERT INTO `kncms_log_rename` VALUES (4, 'Khoi_Nguyenz đã đổi tên thành công', 'rename', '2023-02-27 10:19:57', 14203, 13324, 'Khoi_Nguyenz', 'Khoi_Nguyenz', 'Khoi_Nguyen');

-- ----------------------------
-- Table structure for kncms_log_shop
-- ----------------------------
DROP TABLE IF EXISTS `kncms_log_shop`;
CREATE TABLE `kncms_log_shop`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `curcoin` int NULL DEFAULT NULL,
  `newcoin` int NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modelid` int NULL DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_log_shop
-- ----------------------------
INSERT INTO `kncms_log_shop` VALUES (1, 'Khoi_Nguyen đã mua một toys', 13324, 13024, '2023-02-28 09:56:58', 'toys', 'Khoi_Nguyen', 19019, NULL);
INSERT INTO `kncms_log_shop` VALUES (2, 'Khoi_Nguyen đã mua một toys', 2024, 1724, '2023-02-28 10:12:58', 'toys', 'Khoi_Nguyen', 19019, NULL);
INSERT INTO `kncms_log_shop` VALUES (3, 'Khoi_Nguyen đã mua một chiếc Bobcat', 10724, 9724, '2023-02-28 10:15:58', 'car', 'Khoi_Nguyen', 422, NULL);
INSERT INTO `kncms_log_shop` VALUES (4, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:19:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (5, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:20:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (6, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:20:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (7, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:20:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (8, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:21:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (9, 'Khoi_Nguyen đã mua một Boombox', 9724, 8724, '2023-03-01 10:22:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (10, 'Khoi_Nguyen đã mua một chiếc Bobcat', 8724, 7724, '2023-03-01 10:23:59', 'car', 'Khoi_Nguyen', 422, NULL);
INSERT INTO `kncms_log_shop` VALUES (11, 'Khoi_Nguyen đã mua một chiếc Infernus', 7724, 6724, '2023-03-01 10:23:59', 'moto', 'Khoi_Nguyen', 411, NULL);
INSERT INTO `kncms_log_shop` VALUES (12, 'Khoi_Nguyen đã mua một toys', 6724, 6424, '2023-03-01 10:23:59', 'toys', 'Khoi_Nguyen', 19019, NULL);
INSERT INTO `kncms_log_shop` VALUES (13, 'Khoi_Nguyen đã mua một Boombox', 6424, 5424, '2023-03-01 10:23:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (14, 'Khoi_Nguyen đã mua một Boombox', 5424, 4424, '2023-03-01 10:24:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (15, 'Khoi_Nguyen đã mua một Boombox', 4424, 3424, '2023-03-01 11:12:59', 'item', 'Khoi_Nguyen', 0, NULL);
INSERT INTO `kncms_log_shop` VALUES (16, 'Khoi_Nguyen đã mua một chiếc Jetmax', 1000000, 999000, '2023-08-13 12:41:224', 'tauthuyen', 'Khoi_Nguyen', 446, NULL);
INSERT INTO `kncms_log_shop` VALUES (17, 'Khoi_Nguyen đã mua một chiếc Jetmax', 999000, 998000, '2023-08-13 12:43:224', 'tauthuyen', 'Khoi_Nguyen', 446, NULL);
INSERT INTO `kncms_log_shop` VALUES (18, 'Khoi_Nguyen đã mua một chiếc Jetmax', 999000, 998000, '2023-08-13 12:44:224', 'tauthuyen', 'Khoi_Nguyen', 446, NULL);

-- ----------------------------
-- Table structure for kncms_momo
-- ----------------------------
DROP TABLE IF EXISTS `kncms_momo`;
CREATE TABLE `kncms_momo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sdt` int NULL DEFAULT NULL,
  `sotien` int NULL DEFAULT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uid` int NULL DEFAULT NULL,
  `mgd` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_momo
-- ----------------------------
INSERT INTO `kncms_momo` VALUES (32, 'Khoi_Nguyenz', 911776022, 560, 'Khoi_Nguyenz', 2315, 2147483647);

-- ----------------------------
-- Table structure for kncms_mp3
-- ----------------------------
DROP TABLE IF EXISTS `kncms_mp3`;
CREATE TABLE `kncms_mp3`  (
  `id` int NOT NULL,
  `uid` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_mp3
-- ----------------------------

-- ----------------------------
-- Table structure for kncms_napthe
-- ----------------------------
DROP TABLE IF EXISTS `kncms_napthe`;
CREATE TABLE `kncms_napthe`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uid` int NULL DEFAULT NULL,
  `server_api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_napthe
-- ----------------------------
INSERT INTO `kncms_napthe` VALUES (24, 'VIETTEL', '1000000', '56784526782', '5678452678999', '1', 2315, NULL);
INSERT INTO `kncms_napthe` VALUES (25, 'VIETTEL', '300000', '56784526712', '5678452678991', '3', 2315, NULL);
INSERT INTO `kncms_napthe` VALUES (26, 'VIETTEL', '100000', '56784526718', '5678452678996', '3', 2315, 'https://www.doithe1s.vn/');

-- ----------------------------
-- Table structure for kncms_pages
-- ----------------------------
DROP TABLE IF EXISTS `kncms_pages`;
CREATE TABLE `kncms_pages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `href` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iddanhmuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_pages
-- ----------------------------
INSERT INTO `kncms_pages` VALUES (1, 'Category Test', 'Home', '<i class=\"fa-brands fa-rocketchat\"></i>', '1', 'category-test');
INSERT INTO `kncms_pages` VALUES (4, 'Category Test', 'Home', '<i class=\"fa-brands fa-rocketchat\"></i>', '2', 'category-test');

-- ----------------------------
-- Table structure for kncms_settings
-- ----------------------------
DROP TABLE IF EXISTS `kncms_settings`;
CREATE TABLE `kncms_settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `PriceOOC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Fav` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TokenMomo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SDTMOMO` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `OwnerMOMO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `EnbleMailer` int NULL DEFAULT 0,
  `APIKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `APIID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ServerAPI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '2',
  `XF_APIKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `XF_APIID` varbinary(255) NULL DEFAULT NULL,
  `PriceRename` int NULL DEFAULT NULL,
  `iframePage` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iframeDiscord` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Licenses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_settings
-- ----------------------------
INSERT INTO `kncms_settings` VALUES (2, 'GTAVN Roleplay', 'Minh Nhật', 'Coins', 'lib/img/logo.png', 'http://localhost/ucp_news/lib/img/logo.png', 'Khôi Nguyên', '381bc04f-87a2-479f-93b5-d80c50664a50', '0971920024', 'Khôi Nguyên', 0, '879dd9889504ba955179d83a5a25cbcd', '879dd9889504ba955179d83a5a25cbcd', '2', NULL, NULL, 100, '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fompvn&tabs=timeline&width=350&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=965423960793767\" width=\"350\" height=\"500\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', '<iframe src=\"https://discordapp.com/widget?id=1064197348948987954&theme=dark\" width=\"350\" height=\"500\" allowtransparency=\"true\" frameborder=\"0\" sandbox=\"allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts\"></iframe>', 'ADMIN');

-- ----------------------------
-- Table structure for kncms_toys
-- ----------------------------
DROP TABLE IF EXISTS `kncms_toys`;
CREATE TABLE `kncms_toys`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ooc_price` int NULL DEFAULT NULL,
  `price` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `modelid` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_toys
-- ----------------------------
INSERT INTO `kncms_toys` VALUES (1, 300, 100000, 10, 19019, 'Kinh');

-- ----------------------------
-- Table structure for kncms_vehs
-- ----------------------------
DROP TABLE IF EXISTS `kncms_vehs`;
CREATE TABLE `kncms_vehs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` int NULL DEFAULT NULL,
  `ooc_price` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `model` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kncms_vehs
-- ----------------------------
INSERT INTO `kncms_vehs` VALUES (3, 'Maver', 100000, 5000, 2, 'maybay', 487);
INSERT INTO `kncms_vehs` VALUES (4, 'Jetmax', 20000, 1000, 0, 'tauthuyen', 446);
INSERT INTO `kncms_vehs` VALUES (13, 'Bobcat', 10000, 1000, -13, 'car', 422);
INSERT INTO `kncms_vehs` VALUES (14, 'Infernus', 10000, 1000, 0, 'moto', 411);

SET FOREIGN_KEY_CHECKS = 1;
