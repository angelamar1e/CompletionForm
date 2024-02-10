/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : completion_form

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 10/02/2024 10:06:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for campuses
-- ----------------------------
DROP TABLE IF EXISTS `campuses`;
CREATE TABLE `campuses`  (
  `campus_id` int NOT NULL AUTO_INCREMENT,
  `campus_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`campus_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of campuses
-- ----------------------------
INSERT INTO `campuses` VALUES (1, 'A. Mabini Campus');
INSERT INTO `campuses` VALUES (2, 'NDC Compound Campus');
INSERT INTO `campuses` VALUES (3, 'M.H. Del Pilar Campus');

-- ----------------------------
-- Table structure for completion_requests
-- ----------------------------
DROP TABLE IF EXISTS `completion_requests`;
CREATE TABLE `completion_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `control_number` int NULL DEFAULT NULL,
  `final_grade` decimal(2, 2) NULL DEFAULT NULL,
  `units` decimal(2, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `completion_request_info`(`control_number` ASC) USING BTREE,
  CONSTRAINT `completion_request_info` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of completion_requests
-- ----------------------------

-- ----------------------------
-- Table structure for correction_requests
-- ----------------------------
DROP TABLE IF EXISTS `correction_requests`;
CREATE TABLE `correction_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `control_number` int NULL DEFAULT NULL,
  `modified_fname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modified_mname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modified_lname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `correction_request_info`(`control_number` ASC) USING BTREE,
  CONSTRAINT `correction_request_info` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of correction_requests
-- ----------------------------

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `course_code` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course_title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`course_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES ('AB-PHI', 'Bachelor of Arts in Philosophy');
INSERT INTO `courses` VALUES ('ABCLS', 'Bachelor of Arts in Literature and Cultural Studies');
INSERT INTO `courses` VALUES ('ABELS', 'Bachelor of Arts in English Language Studies');
INSERT INTO `courses` VALUES ('ABF', 'Batsilyer ng Artes sa Filipinolohiya');
INSERT INTO `courses` VALUES ('BAB', 'Bachelor of Arts in Broadcasting');
INSERT INTO `courses` VALUES ('BAC', 'Bachelor of Arts in Communication');
INSERT INTO `courses` VALUES ('BAEcon', 'Bachelor of Arts in Economics');
INSERT INTO `courses` VALUES ('BAHist', 'Bachelor of Arts in History');
INSERT INTO `courses` VALUES ('BAJ', 'Bachelor of Arts in Journalism');
INSERT INTO `courses` VALUES ('BAPR', 'Bachelor of Arts in Public Relations');
INSERT INTO `courses` VALUES ('BAPS', 'Bachelor of Arts in Political Science');
INSERT INTO `courses` VALUES ('BAPsy', 'Bachelor of Arts in Psychology');
INSERT INTO `courses` VALUES ('BASoc', 'Bachelor of Arts in Sociology');
INSERT INTO `courses` VALUES ('BEEd', 'Bachelor of Elementary Education');
INSERT INTO `courses` VALUES ('BPA', 'Bachelor of Public Administration');
INSERT INTO `courses` VALUES ('BPE', 'Bachelor of Physical Education');
INSERT INTO `courses` VALUES ('BPEA', 'Bachelor of Performing Arts Major in Theater Arts');
INSERT INTO `courses` VALUES ('BSA', 'Bachelor of Science in Accountancy');
INSERT INTO `courses` VALUES ('BSAr', 'Bachelor of Science in Architechture');
INSERT INTO `courses` VALUES ('BSBA', 'Bachelor of Science in Business Administration');
INSERT INTO `courses` VALUES ('BSBA-F', 'BSBA-Financial Management');
INSERT INTO `courses` VALUES ('BSBA-H', 'BSBA-Human Resourse Development Management');
INSERT INTO `courses` VALUES ('BSBA-M', 'BSBA-Marketing Management');
INSERT INTO `courses` VALUES ('BSBA-O', 'BSBA-Operations Management');
INSERT INTO `courses` VALUES ('BSBio', 'Bachelor of Science in Biology');
INSERT INTO `courses` VALUES ('BSCE', ' Bachelor of Science in Civil Engineering');
INSERT INTO `courses` VALUES ('BSChE', 'Bachelor of Science in Chemical Engineering');
INSERT INTO `courses` VALUES ('BSChem', 'Bachelor of Science in Chemistry');
INSERT INTO `courses` VALUES ('BSCpE', 'Bachelor of Science in Computer Engineering');
INSERT INTO `courses` VALUES ('BSCS', 'Bachelor of Science in Computer Science');
INSERT INTO `courses` VALUES ('BSECE', 'Bachelor of Science in Electronics Engineering');
INSERT INTO `courses` VALUES ('BSEd', 'Bachelor of Secondary Education');
INSERT INTO `courses` VALUES ('BSEE', 'Bachelor of Science in Electrical Engineering');
INSERT INTO `courses` VALUES ('BSEPM', 'Bachelor of Science in Enviromental Planning and Management');
INSERT INTO `courses` VALUES ('BSHM', 'Bachelor of Science in Hospitality Management');
INSERT INTO `courses` VALUES ('BSID', 'Bachelor of Science in Interior Design');
INSERT INTO `courses` VALUES ('BSIE', 'Bachelor of Science in Industrial Engineering');
INSERT INTO `courses` VALUES ('BSIS', 'Bachelor of Science in Information Systems');
INSERT INTO `courses` VALUES ('BSIT', 'Bachelor of Science in Information Technology');
INSERT INTO `courses` VALUES ('BSLA', 'Bachelor of Science in Landscape Architecture');
INSERT INTO `courses` VALUES ('BSMA', 'Bachelor of Science in Management Accounting');
INSERT INTO `courses` VALUES ('BSMath', 'Bachelor of Science in Mathematics');
INSERT INTO `courses` VALUES ('BSME', 'Bachelor of Science in Mechanical Engineering');
INSERT INTO `courses` VALUES ('BSMinE', 'Bachelor of Science in Mining Engineering');
INSERT INTO `courses` VALUES ('BSP', 'Bachelor of Science in Physics');
INSERT INTO `courses` VALUES ('BSS', 'Bachelor of Sports Science');
INSERT INTO `courses` VALUES ('BSTM', 'Bachelor of Science in Tourism Management');
INSERT INTO `courses` VALUES ('BSTrM', 'Bachelor of Science in Travel Management');

-- ----------------------------
-- Table structure for late_reporting_requests
-- ----------------------------
DROP TABLE IF EXISTS `late_reporting_requests`;
CREATE TABLE `late_reporting_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `control_number` int NULL DEFAULT NULL,
  `final_grade` decimal(2, 2) NULL DEFAULT NULL,
  `units` decimal(2, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `late_request_info`(`control_number` ASC) USING BTREE,
  CONSTRAINT `late_request_info` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests`  (
  `control_number` int NOT NULL,
  `student_number` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subject_code` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subject_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `session_code` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `term_code` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `campus_id` int NULL DEFAULT NULL,
  `reported_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` date NULL DEFAULT NULL,
  `requested_by` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`control_number`) USING BTREE,
  INDEX `student`(`student_number` ASC) USING BTREE,
  INDEX `session`(`session_code` ASC) USING BTREE,
  INDEX `term`(`term_code` ASC) USING BTREE,
  INDEX `campus`(`campus_id` ASC) USING BTREE,
  CONSTRAINT `campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`campus_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `session` FOREIGN KEY (`session_code`) REFERENCES `sessions` (`session_code`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `student` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `term` FOREIGN KEY (`term_code`) REFERENCES `terms` (`term_code`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `session_code` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `session_desc` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`session_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('D', 'Day Session');
INSERT INTO `sessions` VALUES ('N', 'Night Session');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `student_number` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `course_code` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `year` int NULL DEFAULT NULL,
  `section` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`student_number`) USING BTREE,
  INDEX `course`(`course_code` ASC) USING BTREE,
  CONSTRAINT `course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for terms
-- ----------------------------
DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms`  (
  `term_code` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `term_desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`term_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of terms
-- ----------------------------
INSERT INTO `terms` VALUES ('1st', 'First Semester');
INSERT INTO `terms` VALUES ('2nd', 'Second Semester');
INSERT INTO `terms` VALUES ('Summer', 'Summer Semester');

SET FOREIGN_KEY_CHECKS = 1;
