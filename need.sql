ALTER TABLE `accounts`
  ADD `active_status` int NOT NULL DEFAULT 0,
  ADD `active_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  ADD `recent_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  ADD `LastUCP_Login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  ADD `ProfileVeh` int NULL DEFAULT 1,
  ADD `ProfileToys` int NULL DEFAULT 1,
  ADD `VerifyPin` int NULL DEFAULT 1,
  ADD `Pin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  ADD `reset_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  ADD `reset_status` int NULL DEFAULT 0,
  ADD  `active_account` int NULL DEFAULT 0;



