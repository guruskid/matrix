-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 12:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cryptomatrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `activated_plans`
--

CREATE TABLE IF NOT EXISTS `activated_plans` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `user_encrypted_id` text NOT NULL,
  `plan_encrypted_id` text NOT NULL,
  `date_activated` text NOT NULL,
  `date_deactivated` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 means active 0 means not activate',
  `deposit_date` text NOT NULL,
  `deposit_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 means not deposited, 1 means deposited'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activated_plans`
--

INSERT INTO `activated_plans` (`id`, `encrypted_id`, `user_encrypted_id`, `plan_encrypted_id`, `date_activated`, `date_deactivated`, `status`, `deposit_date`, `deposit_status`) VALUES
(1, 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'nVuqMNbIbVf2Bq6yXPO5qFKkJArB88G7ZYoScinXbxCu0pOznJjhPUf6otZnLTxNQ9f4l9uowMyjY0qAcOZB3akvdRwzF17TlU3yU67jVvyivkQWpBc1px1ezVa0YqjvrC6mIedgeMWYgRQLNoiRUSXtgGgDeS4DntlPAXLI7saAmtODsHmsbZrWueh5rwJioPRlKEpbaE30OJpSdIzxfkfaKFD9RHCFHHTiV2FQmN45Md02D6I49zl29r', '2020-08-18', '2020-07-28', 0, '2020-08-20 21:23:37', 1),
(2, 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'nVuqMNbIbVf2Bq6yXPO5qFKkJArB88G7ZYoScinXbxCu0pOznJjhPUf6otZnLTxNQ9f4l9uowMyjY0qAcOZB3akvdRwzF17TlU3yU67jVvyivkQWpBc1px1ezVa0YqjvrC6mIedgeMWYgRQLNoiRUSXtgGgDeS4DntlPAXLI7saAmtODsHmsbZrWueh5rwJioPRlKEpbaE30OJpSdIzxfkfaKFD9RHCFHHTiV2FQmN45Md02D6I49zl29r', '2020-08-18', '2020-07-28', 0, '2020-08-20 21:30:35', 1),
(4, 'HYZFs906crX4eIsOvViCEQwMJtrYWzXp6TlQrFbLstvjhga0RIh0v5T5QobAqqhINVBKaN9YGl1S21ywkUpuWaJjn5mjlDiTXNMKCfn4EyPlisK8B8n81Um7q2ojk7TDAbX8RGgLqEM5RJk8DxrRfxyOWzNC2zgPhE2FBf9uuCWRHa3F2etP9whvJpbXZdSULLuIt9xnPOgSm3dGFb7ip36y73o4Ske4aL3A7OlBoZzGUyck1VeHJQdZq6', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'o7gzx1mnbkVhIzAXgR7yfHE2JlGyjqGkp9WjXJaZinecMCZtQpoP3NRdp0tylYI7foRVwZr0WLvp1pTe71v93UrOZhiVLewfXMZUvTrFuwJtzHFAKHiVO5LKYlKEDcEiGk2FSbQxRRCkna38So10AYarYMmI9XPtK8C1gGfFsgIM4B5uTbWH6ndP52x3Ee4sA6K8izQQagk96sSyNATOcmTPJv8YB6wbeUmBWd5zDq70djD2njNrN6cIGy', '2020-08-20', '2020-09-19', 1, '2020-08-22 10:45:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Administrator', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `btc_payment`
--

CREATE TABLE IF NOT EXISTS `btc_payment` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `wallet_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btc_payment`
--

INSERT INTO `btc_payment` (`id`, `encrypted_id`, `wallet_address`) VALUES
(2, 'HgX59v2sTon1WF1myvjXTes2yJcYLFxeK4DxHu5DlUTEVwsDcz65CbwZWk9EKAr0yYhLzpEqQHQJPSZGideDbd7JOPBX0QrmoKIgpy48V78SZKLabF96j7BHENeRt4OGMC8Wr35kHLRiMW0m19QwTCBPz1DUVv8MESBI9nYax3fu7fjBJPwolxMiIl80XtGNddaTGZmPRM6fkt2ZwOQ3k6OUcr3GAhqdpm6eqS4jhKfvXpLIRVCFysVizO', 'xi989FND7dn723asdkzbZytwe723d7');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `user_encrypted_id` text NOT NULL,
  `plan_activation_encrypted_id` text NOT NULL,
  `date_of_payment` text NOT NULL,
  `status` text NOT NULL,
  `amount` int(11) NOT NULL,
  `proof_upload_date` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `encrypted_id`, `user_encrypted_id`, `plan_activation_encrypted_id`, `date_of_payment`, `status`, `amount`, `proof_upload_date`) VALUES
(1, '1tDf2MHpVrc5K7h6uOVI1bA0Sdu89sifl9XIvZHiRTmbZGjQeJ5FAXqvDw3m2C0YABNfLUz34DRX0OfAQdOzenxSeErmu63dtYivJGZqQz3EJVGbpYTc8auBUWCZ0B3c7RLwx2E6JTDaSDLiNl7qgH4pak4n6yCqPsqznWtgkC5PTOV05UyRioW82mwkoydzQwYbh1n4GvxrBlM1LQKrUnhwIFExUPlFFNjF9W1cHthkxmkyXIoBuMpP9d', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', 'August 18th, 2020', 'Approved', 100, 'August 18th, 2020 09:24:PM'),
(2, '8wCY8zUaHeaSIU4DV1Z1u0hM4AKVihJ6wGwTo97TUurfdGGIOLn3TSioBqjll7CumKPzWsx0zoB9R4rz8OliMbVAyFQhmAnuEdlo1MnN3SkP3akYXDN6ALyvmgvJRBc5VpFMG9r5pQYeRaQb5uWtgd96NxLElSftFqb0I2qsEx7hmIUrHx2qceTwsVsDFgLDCjevXX5JYw1qCgZfX6c8apkzWJR3PGb2yxcnO7TJNjey7pQAgCcUP9Z3KY', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', 'August 18th, 2020', 'Approved', 100, 'August 18th, 2020 09:30:PM'),
(3, 'eTlKN3MUEOoI6fNHQU9TDzZnoFJbqvMQCPKkpS5ONbPcH6YUqyZdmM1It3SYx8SnWpTKDriTjRpJVE5F2GXJ9wfvCbMdLuGp7o4br80lcoY61O4lJcmm8aVzShc5BuyexyiL3Fc4Bmv6KaESPoIuxrK9lzRn8s6IGshLyHImgydekzXOHCZwWhifAeFRPs92pB0ajjuVd2PgYU7Ng4fFA5svYlGq0dR04HtWAqDx7z21jMnekJrC95nW1Z', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'HYZFs906crX4eIsOvViCEQwMJtrYWzXp6TlQrFbLstvjhga0RIh0v5T5QobAqqhINVBKaN9YGl1S21ywkUpuWaJjn5mjlDiTXNMKCfn4EyPlisK8B8n81Um7q2ojk7TDAbX8RGgLqEM5RJk8DxrRfxyOWzNC2zgPhE2FBf9uuCWRHa3F2etP9whvJpbXZdSULLuIt9xnPOgSm3dGFb7ip36y73o4Ske4aL3A7OlBoZzGUyck1VeHJQdZq6', 'August 20th, 2020', 'Approved', 200, 'August 20th, 2020 10:52:AM');

-- --------------------------------------------------------

--
-- Table structure for table `earnings_withdrawals`
--

CREATE TABLE IF NOT EXISTS `earnings_withdrawals` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `user_encrypted_id` text NOT NULL,
  `plan_activation_encrypted_id` text NOT NULL,
  `amount` float NOT NULL,
  `date_initiated` text NOT NULL,
  `status` text NOT NULL,
  `user_request_date` text NOT NULL,
  `processed_date` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earnings_withdrawals`
--

INSERT INTO `earnings_withdrawals` (`id`, `encrypted_id`, `user_encrypted_id`, `plan_activation_encrypted_id`, `amount`, `date_initiated`, `status`, `user_request_date`, `processed_date`, `type`) VALUES
(2, 'lGMqa3Px3KS3UDWWntw5aOc1yG4HzcVbS15FlNCcdNTFLptel9UeOr27U02ZT1jVWui8qYfWD3Sd2OBqxnJdZP9jwX4u70y68EA7gHpcJAIvOQgIWMj0zKagwG0A1h9xHbazxIrLwNlg7MuaMShBXsiimlVmpOrbdroPmAFE4ePbL6d6nRK4Ss8YDVXoCRtyNwXFeye1nGkQkICPi5DjqXtv4Kozv8IQ8guGoJY2fLZB3AphYJRt50mTs9', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', 104, 'August 19th 2020 12:09:AM', 'Approved', 'August 19th, 2020', 'August 19th, 2020 12:34:PM', 'Returns'),
(4, 'QNiOnyMDxr6WxI1vVIGQFmayS3dQAeVcJ8mLrHkmq5E23aPwkeAdSBaFWdwxFbRNz517Zlm1R2u4OzXghOXK3ChW5tjxbesQgHXW5Dx74CTMNlGmBkroG8Gi90YeAgSbIfYV6RB4lkaS8UphYU3AB2qFXlDnEtOhjF2JgK1HyfaZpHYRTqJUMUSZEcWiUdGwo7qNvuX9dnZNJMIoqDLvRwskET6fTPcpIErPyfK79LjLYlJw8j7zzobQPe', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', 134, 'August 19th 2020 03:04:PM', 'Processing', 'August 19th, 2020', '', 'Returns');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE IF NOT EXISTS `email_verification` (
`id` int(11) NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `email`, `code`, `time`) VALUES
(4, 'promiseobe532@gmail.com', 'CRYTO-MATRIX-WRXMQ', '2020-08-20 12:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `email_verification` int(11) NOT NULL DEFAULT '0' COMMENT 'if 0 means not activated if 1 means activated',
  `profile_pics` int(11) NOT NULL DEFAULT '0' COMMENT '0 means not verify 1 means verified',
  `capital` int(11) NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '1',
  `date_joined` text NOT NULL,
  `photo_upload` int(11) NOT NULL DEFAULT '0',
  `wallet_address` text NOT NULL,
  `payment_settings` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `encrypted_id`, `fullname`, `email`, `password`, `email_verification`, `profile_pics`, `capital`, `account_status`, `date_joined`, `photo_upload`, `wallet_address`, `payment_settings`) VALUES
(1, 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'Promise', 'promiseobe532@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 1300, 1, 'August 14th 2020 01:08:PM', 1, 'jdXnsdNNu78923XNjsdjdkj9823XXJdjl', 1),
(2, 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'Lex Nwimue', 'promiseobe531@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 300, 1, 'August 15th 2020 01:59:AM', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
`id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_encrypted_id` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `description`, `user_encrypted_id`, `date`) VALUES
(1, 'Direct Deposit of $100 paid on August 20th, 2020 has been Approved', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 18th, 2020 03:47:PM'),
(2, 'Direct Deposit of $100 paid on August 18th, 2020 has been Approved', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 18th, 2020 03:48:PM'),
(3, 'Direct Deposit of $1000 paid on August 18th, 2020 has been Approved', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 18th, 2020 09:20:PM'),
(4, 'Direct Deposit of $100 paid on August 18th, 2020 has been Approved', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 18th, 2020 09:24:PM'),
(5, 'Direct Deposit of $100 paid on August 18th, 2020 has been Approved', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 18th, 2020 09:31:PM'),
(6, 'Withdrawal of  $104 was Successfully', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 11:52:AM'),
(7, 'Withdrawal of  $104 was Declined', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 12:16:PM'),
(8, 'Withdrawal of  $104 was Successfully', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 12:34:PM'),
(9, 'Withdrawal of  $104 was Declined', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 12:44:PM'),
(10, 'Withdrawal of  $104 was Declined', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 12:48:PM'),
(11, 'Top Up of $10  has been added to your account by Admin.', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 02:58:PM'),
(12, 'Top Up of $30  has been added to your account by Admin.', 'KvVMOE1v2yqXistJAjcNnTaEdpaHBfv7Px8QQownsHT4wrIumz8DbWs6ebRa0kgD1WCGZJHcco3Nv8YHExphwKPe8fmLFXzA1mpTbEnQtorVV97Yr4bjFdt6wNkrU3h9GumB19Kp2bc3oHCrCgEOX2sGGPyOuURAkgdaqR0LhtZBell6Mgn0hvI7NZN53uPaf7gDAifIxFn5j5tUmyljzoUC3OLZUWLJql9M6iR5DqpRX96xz8f2IdCuwA', 'August 19th, 2020 03:01:PM'),
(13, 'User Account has Been Blocked by Admin', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 20th, 2020 02:01:AM'),
(14, 'User Account has Been Unblocked by Admin', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 20th, 2020 10:16:AM'),
(15, 'User Account has Been Blocked by Admin', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 20th, 2020 10:31:AM'),
(16, 'User Account has Been Unblocked by Admin', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 20th, 2020 10:40:AM'),
(17, 'Direct Deposit of $200 paid on August 20th, 2020 has been Approved', 'Y6eLSY4a8Mp85kXO2PXYG3Ear8uE11PDMihvrClwcjJJDILa24phcMv3sv4IkyV6tRVLyYzSQqVqlmvTMAgk13ud9xci9DxfJOp6bs56BNct0ZC0LCRJdcuGrt5EwMe5ZonQ7luz7EsTbIvW2XK8W7H2KQl9obTiAmbyBha85egnetAWxsVRksmdUhS7wjRnxCKSdPtHRw4IGNjX9UOF0paf2NgEVLPFgOjAfYB4i1oDnNTuHDFdn9XeIS', 'August 20th, 2020 10:52:AM');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
`id` int(11) NOT NULL,
  `encrypted_id` text NOT NULL,
  `name` text NOT NULL,
  `daily_earning` text NOT NULL,
  `amount` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `encrypted_id`, `name`, `daily_earning`, `amount`, `days`) VALUES
(1, 'nVuqMNbIbVf2Bq6yXPO5qFKkJArB88G7ZYoScinXbxCu0pOznJjhPUf6otZnLTxNQ9f4l9uowMyjY0qAcOZB3akvdRwzF17TlU3yU67jVvyivkQWpBc1px1ezVa0YqjvrC6mIedgeMWYgRQLNoiRUSXtgGgDeS4DntlPAXLI7saAmtODsHmsbZrWueh5rwJioPRlKEpbaE30OJpSdIzxfkfaKFD9RHCFHHTiV2FQmN45Md02D6I49zl29r', 'Premium ', '2.0', 100, 10),
(2, 'o7gzx1mnbkVhIzAXgR7yfHE2JlGyjqGkp9WjXJaZinecMCZtQpoP3NRdp0tylYI7foRVwZr0WLvp1pTe71v93UrOZhiVLewfXMZUvTrFuwJtzHFAKHiVO5LKYlKEDcEiGk2FSbQxRRCkna38So10AYarYMmI9XPtK8C1gGfFsgIM4B5uTbWH6ndP52x3Ee4sA6K8izQQagk96sSyNATOcmTPJv8YB6wbeUmBWd5zDq70djD2njNrN6cIGy', 'Gold', '3.0', 200, 30),
(3, 'TCZpKPJ29rjnYFXhjfWHezNtsiXrZhQmo2kog8x98K3bAPXGEl6hocuaeTQDV63MRWtx2SLMcp0NDDpmflAbXiaoZENoq7JA8yz44mHdsHKHI5Y1F1uqW0edyq7lU66tBdx5aiGy7ywiEHnkApqND7KQnWqdBPxEsufDPnbSORl9gi4SgCwQjNGRacgt67w5IcSF3PvBCCtG3Fzw15rmMk2zVGb09E4TSBl1O8UI4YL0LLWbRUnjOL9shu', 'Platinum', '3.5', 1000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
`id` int(11) NOT NULL,
  `plan_activation_encrypted_id` text NOT NULL,
  `date` text NOT NULL,
  `daily_earning` int(11) NOT NULL DEFAULT '0',
  `status` char(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `plan_activation_encrypted_id`, `date`, `daily_earning`, `status`) VALUES
(4, 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', '2020-8-18', 2, 'Processed'),
(5, 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', '2020-8-18', 2, 'Processed'),
(6, 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', '2020-8-17', 2, 'Processed'),
(7, 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', '2020-8-17', 2, 'Processed'),
(8, 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', '2020-8-19', 0, 'Pending'),
(9, 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', '2020-8-19', 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
`id` int(11) NOT NULL,
  `plan_activation_encrypted_id` text NOT NULL,
  `amount` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `plan_activation_encrypted_id`, `amount`, `date`) VALUES
(1, 'RlkWORqVFvBy54ebIkHDXZaQZjgqJUkn5IoMiGu3Jyadb5hj0jYYJCti1Ue6hM97BVpS8Lq6nHrpmowPk6uVnTLyTX6BkyEYYKZx7sfuaid3euAxcrHvsNdPN84cZfsTILB7WA1OFpIQU1o0UhWXrvwg4nfKFK0oiQywCBChEVo8SH4PzIn4QYzrRDtN6mftlvgKAGQSL3GejbwcX22V7tR2SqbdfuZCDD8PFGw3NEpJ07zaTJvKAM5qaO', '10', 'August 19th, 2020 02:58:PM'),
(2, 'HKDdoTvU6Ers4jfOemn2FtpX0CSiCznFyjIxm5IAEgbqW2wpuUaeBRL6OQ1H0NN6eiJ7VXZpwKL8WMgNSOqfMtfbB37d84gcPQJyBlCuL0zp4r4YyZaGSf1xU2GChDgGSk6n0lv1aTmeY0foWZxAr5tBDctcq3PurRIaDLn9HkXVEQ1KstsbmVJ75XhIVGMlYmRO9dBbQDCiu2vk3qzTMWJkP4ojA7ial9Q2deFjolGihgwUTHs8qPAvSo', '30', 'August 19th, 2020 03:01:PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activated_plans`
--
ALTER TABLE `activated_plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `btc_payment`
--
ALTER TABLE `btc_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings_withdrawals`
--
ALTER TABLE `earnings_withdrawals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activated_plans`
--
ALTER TABLE `activated_plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `btc_payment`
--
ALTER TABLE `btc_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `earnings_withdrawals`
--
ALTER TABLE `earnings_withdrawals`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
