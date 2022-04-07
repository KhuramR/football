-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 12:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `link`, `image`, `short_description`, `long_description`, `date_time`) VALUES
(1, 'Howler is a Magazine About Soccer', 'howler-is-a-magazine-about-soccer', '06042022082748sm3.jpg', 'SSB3aWxsIGdpdmUgeW91IGEgY29tcGxldGUgYWNjb3VudCBvZiB0aGUgc3lzdGVtLCBhbmQgZXhwb3VuZCB0aGUgYWN0dWFsIHRlYWNoaW5ncyBvZiB0aGUgZ3JlYXQgZXhwbG9yZXIgb2YgdGhlIHRydXRoLg==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luOiAwcHggMHB4IDI2cHg7IGNvbG9yOiAjNDg0ODQ4OyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlcmUgYXJlIG1hbnkgdmFyaWF0aW9ucyBvZiBwYXNzYWdlcyBvZiBMb3JlbSBJcHN1bSBhdmFpbGFibGUsIGJ1dCB0aGUgbWFqb3JpdHkgaGF2ZSBzdWZmZXJlZCBhbHRlcmF0aW9uIGluIHNvbWUgZm9ybSwgYnkgaW5qZWN0ZWQgaHVtb3VyLCBvciByYW5kb21pc2VkIHdvcmRzIHdoaWNoIGRvbid0IGxvb2sgZXZlbiBzbGlnaHRseSBiZWxpZXZhYmxlLiBJZiB5b3UgYXJlIGdvaW5nIHRvIHVzZSBhIHBhc3NhZ2Ugb2YgTG9yZW0gSXBzdW0sIHlvdSBuZWVkIHRvIGJlIHN1cmUgdGhlcmUgaXNuJ3QgYW55dGhpbmcgZW1iYXJyYXNzaW5nIGhpZGRlbiBpbiB0aGUgbWlkZGxlIG9mIHRleHQuPC9wPg0KPGJsb2NrcXVvdGUgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IHBhZGRpbmc6IDI0cHggMjVweCAyNHB4IDYzcHg7IG1hcmdpbjogMjVweCAwcHg7IGZvbnQtc2l6ZTogMThweDsgYmFja2dyb3VuZDogI2YwZjBmMDsgY29sb3I6ICMxMTExMTE7IGZvbnQtc3R5bGU6IGl0YWxpYzsgcG9zaXRpb246IHJlbGF0aXZlOyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsiPkNvbnRyYXJ5IHRvIHBvcHVsYXIgYmVsaWVmLCBMb3JlbSBJcHN1bSBpcyBub3Qgc2ltcGx5IHJhbmRvbSB0ZXh0LiBJdCBoYXMgcm9vdHMgaW4gYSBwaWVjZSBvZiBjbGFzc2ljYWwgTGF0aW4gbGl0ZXJhdHVyZSBmcm9tIDQ1IEJDPC9ibG9ja3F1b3RlPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbjogMHB4IDBweCAyNnB4OyBjb2xvcjogIzQ4NDg0ODsgZm9udC1mYW1pbHk6IFBvcHBpbnMsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlJpY2hhcmQgTWNDbGludG9jaywgYSBMYXRpbiBwcm9mZXNzb3IgYXQgSGFtcGRlbi1TeWRuZXkgQ29sbGVnZSBpbiBWaXJnaW5pYSwgbG9va2VkIHVwIG9uZSBvZiB0aGUgbW9yZSBvYnNjdXJlIExhdGluIHdvcmRzLCBjb25zZWN0ZXR1cjwvcD4NCjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW46IDBweCAwcHggMjZweDsgY29sb3I6ICM0ODQ4NDg7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE1cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGlzIGJvb2sgaXMgYSB0cmVhdGlzZSBvbiB0aGUgdGhlb3J5IG9mIGV0aGljcywgdmVyeSBwb3B1bGFyIGR1cmluZyB0aGUgUmVuYWlzc2FuY2UuIFRoZSBmaXJzdCBsaW5lIG9mIExvcmVtIElwc3VtLCAiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuLiIsIGNvbWVzIGZyb20gYSBsaW5lIGluIHNlY3Rpb24gMS4xMC4zMi48L3A+DQo=', '2022-04-06 06:27:48'),
(2, 'Comment notre cheveu pousse-t-il', 'comment-notre-cheveu-pousse-t-il', '06042022082555sm2.jpg', 'SSB3aWxsIGdpdmUgeW91IGEgY29tcGxldGUgYWNjb3VudCBvZiB0aGUgc3lzdGVtLCBhbmQgZXhwb3VuZCB0aGUgYWN0dWFsIHRlYWNoaW5ncyBvZiB0aGUgZ3JlYXQgZXhwbG9yZXIgb2YgdGhlIHRydXRoLg==', 'PCFET0NUWVBFIGh0bWw+XHJcbjxodG1sPlxyXG48aGVhZD5cclxuPC9oZWFkPlxyXG48Ym9keT4NCjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW46IDBweCAwcHggMjZweDsgY29sb3I6ICM0ODQ4NDg7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE1cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGVyZSBhcmUgbWFueSB2YXJpYXRpb25zIG9mIHBhc3NhZ2VzIG9mIExvcmVtIElwc3VtIGF2YWlsYWJsZSwgYnV0IHRoZSBtYWpvcml0eSBoYXZlIHN1ZmZlcmVkIGFsdGVyYXRpb24gaW4gc29tZSBmb3JtLCBieSBpbmplY3RlZCBodW1vdXIsIG9yIHJhbmRvbWlzZWQgd29yZHMgd2hpY2ggZG9uJ3QgbG9vayBldmVuIHNsaWdodGx5IGJlbGlldmFibGUuIElmIHlvdSBhcmUgZ29pbmcgdG8gdXNlIGEgcGFzc2FnZSBvZiBMb3JlbSBJcHN1bSwgeW91IG5lZWQgdG8gYmUgc3VyZSB0aGVyZSBpc24ndCBhbnl0aGluZyBlbWJhcnJhc3NpbmcgaGlkZGVuIGluIHRoZSBtaWRkbGUgb2YgdGV4dC48L3A+DQo8YmxvY2txdW90ZSBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgcGFkZGluZzogMjRweCAyNXB4IDI0cHggNjNweDsgbWFyZ2luOiAyNXB4IDBweDsgZm9udC1zaXplOiAxOHB4OyBiYWNrZ3JvdW5kOiAjZjBmMGYwOyBjb2xvcjogIzExMTExMTsgZm9udC1zdHlsZTogaXRhbGljOyBwb3NpdGlvbjogcmVsYXRpdmU7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyI+Q29udHJhcnkgdG8gcG9wdWxhciBiZWxpZWYsIExvcmVtIElwc3VtIGlzIG5vdCBzaW1wbHkgcmFuZG9tIHRleHQuIEl0IGhhcyByb290cyBpbiBhIHBpZWNlIG9mIGNsYXNzaWNhbCBMYXRpbiBsaXRlcmF0dXJlIGZyb20gNDUgQkM8L2Jsb2NrcXVvdGU+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luOiAwcHggMHB4IDI2cHg7IGNvbG9yOiAjNDg0ODQ4OyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+UmljaGFyZCBNY0NsaW50b2NrLCBhIExhdGluIHByb2Zlc3NvciBhdCBIYW1wZGVuLVN5ZG5leSBDb2xsZWdlIGluIFZpcmdpbmlhLCBsb29rZWQgdXAgb25lIG9mIHRoZSBtb3JlIG9ic2N1cmUgTGF0aW4gd29yZHMsIGNvbnNlY3RldHVyPC9wPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbjogMHB4IDBweCAyNnB4OyBjb2xvcjogIzQ4NDg0ODsgZm9udC1mYW1pbHk6IFBvcHBpbnMsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlRoaXMgYm9vayBpcyBhIHRyZWF0aXNlIG9uIHRoZSB0aGVvcnkgb2YgZXRoaWNzLCB2ZXJ5IHBvcHVsYXIgZHVyaW5nIHRoZSBSZW5haXNzYW5jZS4gVGhlIGZpcnN0IGxpbmUgb2YgTG9yZW0gSXBzdW0sICJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldC4uIiwgY29tZXMgZnJvbSBhIGxpbmUgaW4gc2VjdGlvbiAxLjEwLjMyLjwvcD4NCjwvYm9keT5cclxuPC9odG1sPg==', '2022-04-06 06:25:55'),
(4, 'United We Stand, United We Write', 'united-we-stand-united-we-write', '060420220806141.jpg', 'SSB3aWxsIGdpdmUgeW91IGEgY29tcGxldGUgYWNjb3VudCBvZiB0aGUgc3lzdGVtLCBhbmQgZXhwb3VuZCB0aGUgYWN0dWFsIHRlYWNoaW5ncyBvZiB0aGUgZ3JlYXQgZXhwbG9yZXIgb2YgdGhlIHRydXRoLg==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luOiAwcHggMHB4IDI2cHg7IGNvbG9yOiAjNDg0ODQ4OyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlcmUgYXJlIG1hbnkgdmFyaWF0aW9ucyBvZiBwYXNzYWdlcyBvZiBMb3JlbSBJcHN1bSBhdmFpbGFibGUsIGJ1dCB0aGUgbWFqb3JpdHkgaGF2ZSBzdWZmZXJlZCBhbHRlcmF0aW9uIGluIHNvbWUgZm9ybSwgYnkgaW5qZWN0ZWQgaHVtb3VyLCBvciByYW5kb21pc2VkIHdvcmRzIHdoaWNoIGRvbid0IGxvb2sgZXZlbiBzbGlnaHRseSBiZWxpZXZhYmxlLiBJZiB5b3UgYXJlIGdvaW5nIHRvIHVzZSBhIHBhc3NhZ2Ugb2YgTG9yZW0gSXBzdW0sIHlvdSBuZWVkIHRvIGJlIHN1cmUgdGhlcmUgaXNuJ3QgYW55dGhpbmcgZW1iYXJyYXNzaW5nIGhpZGRlbiBpbiB0aGUgbWlkZGxlIG9mIHRleHQuPC9wPg0KPGJsb2NrcXVvdGUgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IHBhZGRpbmc6IDI0cHggMjVweCAyNHB4IDYzcHg7IG1hcmdpbjogMjVweCAwcHg7IGZvbnQtc2l6ZTogMThweDsgYmFja2dyb3VuZDogI2YwZjBmMDsgY29sb3I6ICMxMTExMTE7IGZvbnQtc3R5bGU6IGl0YWxpYzsgcG9zaXRpb246IHJlbGF0aXZlOyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsiPkNvbnRyYXJ5IHRvIHBvcHVsYXIgYmVsaWVmLCBMb3JlbSBJcHN1bSBpcyBub3Qgc2ltcGx5IHJhbmRvbSB0ZXh0LiBJdCBoYXMgcm9vdHMgaW4gYSBwaWVjZSBvZiBjbGFzc2ljYWwgTGF0aW4gbGl0ZXJhdHVyZSBmcm9tIDQ1IEJDPC9ibG9ja3F1b3RlPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbjogMHB4IDBweCAyNnB4OyBjb2xvcjogIzQ4NDg0ODsgZm9udC1mYW1pbHk6IFBvcHBpbnMsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlJpY2hhcmQgTWNDbGludG9jaywgYSBMYXRpbiBwcm9mZXNzb3IgYXQgSGFtcGRlbi1TeWRuZXkgQ29sbGVnZSBpbiBWaXJnaW5pYSwgbG9va2VkIHVwIG9uZSBvZiB0aGUgbW9yZSBvYnNjdXJlIExhdGluIHdvcmRzLCBjb25zZWN0ZXR1cjwvcD4NCjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW46IDBweCAwcHggMjZweDsgY29sb3I6ICM0ODQ4NDg7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE1cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGlzIGJvb2sgaXMgYSB0cmVhdGlzZSBvbiB0aGUgdGhlb3J5IG9mIGV0aGljcywgdmVyeSBwb3B1bGFyIGR1cmluZyB0aGUgUmVuYWlzc2FuY2UuIFRoZSBmaXJzdCBsaW5lIG9mIExvcmVtIElwc3VtLCAiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuLiIsIGNvbWVzIGZyb20gYSBsaW5lIGluIHNlY3Rpb24gMS4xMC4zMi48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', '2022-04-06 06:50:18'),
(5, 'The Award Winning Trishal FC Blog and News Site', 'the-award-winning-trishal-fc-blog-and-news-site', '06042022080701mid1.jpg', 'SSB3aWxsIGdpdmUgeW91IGEgY29tcGxldGUgYWNjb3VudCBvZiB0aGUgc3lzdGVtLCBhbmQgZXhwb3VuZCB0aGUgYWN0dWFsIHRlYWNoaW5ncyBvZiB0aGUgZ3JlYXQgZXhwbG9yZXIgb2YgdGhlIHRydXRoLg==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luOiAwcHggMHB4IDI2cHg7IGNvbG9yOiAjNDg0ODQ4OyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlcmUgYXJlIG1hbnkgdmFyaWF0aW9ucyBvZiBwYXNzYWdlcyBvZiBMb3JlbSBJcHN1bSBhdmFpbGFibGUsIGJ1dCB0aGUgbWFqb3JpdHkgaGF2ZSBzdWZmZXJlZCBhbHRlcmF0aW9uIGluIHNvbWUgZm9ybSwgYnkgaW5qZWN0ZWQgaHVtb3VyLCBvciByYW5kb21pc2VkIHdvcmRzIHdoaWNoIGRvbid0IGxvb2sgZXZlbiBzbGlnaHRseSBiZWxpZXZhYmxlLiBJZiB5b3UgYXJlIGdvaW5nIHRvIHVzZSBhIHBhc3NhZ2Ugb2YgTG9yZW0gSXBzdW0sIHlvdSBuZWVkIHRvIGJlIHN1cmUgdGhlcmUgaXNuJ3QgYW55dGhpbmcgZW1iYXJyYXNzaW5nIGhpZGRlbiBpbiB0aGUgbWlkZGxlIG9mIHRleHQuPC9wPg0KPGJsb2NrcXVvdGUgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IHBhZGRpbmc6IDI0cHggMjVweCAyNHB4IDYzcHg7IG1hcmdpbjogMjVweCAwcHg7IGZvbnQtc2l6ZTogMThweDsgYmFja2dyb3VuZDogI2YwZjBmMDsgY29sb3I6ICMxMTExMTE7IGZvbnQtc3R5bGU6IGl0YWxpYzsgcG9zaXRpb246IHJlbGF0aXZlOyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsiPkNvbnRyYXJ5IHRvIHBvcHVsYXIgYmVsaWVmLCBMb3JlbSBJcHN1bSBpcyBub3Qgc2ltcGx5IHJhbmRvbSB0ZXh0LiBJdCBoYXMgcm9vdHMgaW4gYSBwaWVjZSBvZiBjbGFzc2ljYWwgTGF0aW4gbGl0ZXJhdHVyZSBmcm9tIDQ1IEJDPC9ibG9ja3F1b3RlPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbjogMHB4IDBweCAyNnB4OyBjb2xvcjogIzQ4NDg0ODsgZm9udC1mYW1pbHk6IFBvcHBpbnMsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlJpY2hhcmQgTWNDbGludG9jaywgYSBMYXRpbiBwcm9mZXNzb3IgYXQgSGFtcGRlbi1TeWRuZXkgQ29sbGVnZSBpbiBWaXJnaW5pYSwgbG9va2VkIHVwIG9uZSBvZiB0aGUgbW9yZSBvYnNjdXJlIExhdGluIHdvcmRzLCBjb25zZWN0ZXR1cjwvcD4NCjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW46IDBweCAwcHggMjZweDsgY29sb3I6ICM0ODQ4NDg7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE1cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGlzIGJvb2sgaXMgYSB0cmVhdGlzZSBvbiB0aGUgdGhlb3J5IG9mIGV0aGljcywgdmVyeSBwb3B1bGFyIGR1cmluZyB0aGUgUmVuYWlzc2FuY2UuIFRoZSBmaXJzdCBsaW5lIG9mIExvcmVtIElwc3VtLCAiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuLiIsIGNvbWVzIGZyb20gYSBsaW5lIGluIHNlY3Rpb24gMS4xMC4zMi48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', '2022-04-06 06:49:49'),
(6, 'Everything In Soccer Starts Right Here', 'everything-in-soccer-starts-right-here', '06042022080753mid3.jpg', 'SSB3aWxsIGdpdmUgeW91IGEgY29tcGxldGUgYWNjb3VudCBvZiB0aGUgc3lzdGVtLCBhbmQgZXhwb3VuZCB0aGUgYWN0dWFsIHRlYWNoaW5ncyBvZiB0aGUgZ3JlYXQgZXhwbG9yZXIgb2YgdGhlIHRydXRoLg==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luOiAwcHggMHB4IDI2cHg7IGNvbG9yOiAjNDg0ODQ4OyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlcmUgYXJlIG1hbnkgdmFyaWF0aW9ucyBvZiBwYXNzYWdlcyBvZiBMb3JlbSBJcHN1bSBhdmFpbGFibGUsIGJ1dCB0aGUgbWFqb3JpdHkgaGF2ZSBzdWZmZXJlZCBhbHRlcmF0aW9uIGluIHNvbWUgZm9ybSwgYnkgaW5qZWN0ZWQgaHVtb3VyLCBvciByYW5kb21pc2VkIHdvcmRzIHdoaWNoIGRvbid0IGxvb2sgZXZlbiBzbGlnaHRseSBiZWxpZXZhYmxlLiBJZiB5b3UgYXJlIGdvaW5nIHRvIHVzZSBhIHBhc3NhZ2Ugb2YgTG9yZW0gSXBzdW0sIHlvdSBuZWVkIHRvIGJlIHN1cmUgdGhlcmUgaXNuJ3QgYW55dGhpbmcgZW1iYXJyYXNzaW5nIGhpZGRlbiBpbiB0aGUgbWlkZGxlIG9mIHRleHQuPC9wPg0KPGJsb2NrcXVvdGUgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IHBhZGRpbmc6IDI0cHggMjVweCAyNHB4IDYzcHg7IG1hcmdpbjogMjVweCAwcHg7IGZvbnQtc2l6ZTogMThweDsgYmFja2dyb3VuZDogI2YwZjBmMDsgY29sb3I6ICMxMTExMTE7IGZvbnQtc3R5bGU6IGl0YWxpYzsgcG9zaXRpb246IHJlbGF0aXZlOyBmb250LWZhbWlseTogUG9wcGlucywgc2Fucy1zZXJpZjsiPkNvbnRyYXJ5IHRvIHBvcHVsYXIgYmVsaWVmLCBMb3JlbSBJcHN1bSBpcyBub3Qgc2ltcGx5IHJhbmRvbSB0ZXh0LiBJdCBoYXMgcm9vdHMgaW4gYSBwaWVjZSBvZiBjbGFzc2ljYWwgTGF0aW4gbGl0ZXJhdHVyZSBmcm9tIDQ1IEJDPC9ibG9ja3F1b3RlPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbjogMHB4IDBweCAyNnB4OyBjb2xvcjogIzQ4NDg0ODsgZm9udC1mYW1pbHk6IFBvcHBpbnMsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlJpY2hhcmQgTWNDbGludG9jaywgYSBMYXRpbiBwcm9mZXNzb3IgYXQgSGFtcGRlbi1TeWRuZXkgQ29sbGVnZSBpbiBWaXJnaW5pYSwgbG9va2VkIHVwIG9uZSBvZiB0aGUgbW9yZSBvYnNjdXJlIExhdGluIHdvcmRzLCBjb25zZWN0ZXR1cjwvcD4NCjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW46IDBweCAwcHggMjZweDsgY29sb3I6ICM0ODQ4NDg7IGZvbnQtZmFtaWx5OiBQb3BwaW5zLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE1cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGlzIGJvb2sgaXMgYSB0cmVhdGlzZSBvbiB0aGUgdGhlb3J5IG9mIGV0aGljcywgdmVyeSBwb3B1bGFyIGR1cmluZyB0aGUgUmVuYWlzc2FuY2UuIFRoZSBmaXJzdCBsaW5lIG9mIExvcmVtIElwc3VtLCAiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQuLiIsIGNvbWVzIGZyb20gYSBsaW5lIGluIHNlY3Rpb24gMS4xMC4zMi48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', '2022-04-06 06:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `length_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `color_id`, `size_id`, `length_id`, `weight_id`, `qty`, `ip`, `status`, `invoice_id`, `created`) VALUES
(24, 11, 0, 0, 0, 7, 1, '::1', 1, 13, '2022-01-13 09:35:15'),
(25, 8, 0, 0, 0, 8, 4, '::1', 1, 14, '2022-01-13 15:16:54'),
(27, 12, 0, 0, 0, 8, 1, '39.50.191.126', 0, 0, NULL),
(28, 13, 0, 0, 0, 3, 5, '111.88.39.245', 1, 15, '2022-01-17 23:11:42'),
(29, 6, 0, 0, 0, 6, 99, '111.88.39.245', 0, 0, NULL),
(30, 11, 0, 0, 0, 7, 4, '::1', 1, 16, '2022-01-18 12:38:58'),
(31, 11, 0, 0, 0, 7, 1, '::1', 1, 33, '2022-01-25 11:03:23'),
(32, 11, 0, 0, 0, 7, 4, '39.50.208.175', 1, 17, '2022-01-18 12:18:19'),
(33, 11, 0, 0, 0, 7, 2, '39.50.208.175', 1, 18, '2022-01-18 12:23:10'),
(34, 13, 0, 0, 0, 3, 1, '39.50.208.175', 1, 18, '2022-01-18 12:23:10'),
(35, 13, 0, 0, 0, 3, 10, '39.50.162.61', 1, 19, '2022-01-21 06:58:54'),
(36, 13, 0, 0, 0, 3, 6, '39.50.162.61', 1, 20, '2022-01-21 07:34:54'),
(37, 10, 0, 0, 0, 5, 5, '39.50.162.61', 1, 21, '2022-01-21 07:36:29'),
(38, 11, 0, 0, 0, 7, 5, '39.50.162.61', 1, 22, '2022-01-21 08:14:53'),
(39, 10, 0, 0, 0, 5, 3, '39.50.162.61', 1, 23, '2022-01-21 08:20:37'),
(40, 8, 0, 0, 0, 8, 3, '39.50.162.61', 1, 24, '2022-01-21 08:57:47'),
(41, 6, 0, 0, 0, 6, 20, '39.50.162.61', 1, 25, '2022-01-21 08:59:12'),
(42, 11, 0, 0, 0, 7, 3, '39.50.162.61', 1, 26, '2022-01-21 09:01:34'),
(43, 10, 0, 0, 0, 5, 3, '39.50.162.61', 1, 26, '2022-01-21 09:01:34'),
(44, 13, 0, 0, 0, 3, 3, '39.50.162.61', 1, 26, '2022-01-21 09:01:34'),
(45, 12, 0, 0, 0, 8, 1, '39.50.162.61', 1, 27, '2022-01-21 09:03:17'),
(46, 11, 0, 0, 0, 7, 2, '39.50.162.61', 1, 28, '2022-01-22 05:13:23'),
(47, 11, 0, 0, 0, 7, 3, '39.50.162.61', 1, 29, '2022-01-22 06:41:26'),
(48, 13, 0, 0, 0, 3, 10, '39.50.162.61', 1, 30, '2022-01-22 06:50:13'),
(49, 13, 0, 0, 0, 3, 4, '39.50.162.61', 1, 31, '2022-01-22 10:09:57'),
(50, 12, 0, 0, 0, 8, 6, '39.50.162.61', 1, 32, '2022-01-22 10:23:04'),
(51, 12, 0, 0, 0, 8, 3, '::1', 1, 33, '2022-01-25 11:03:23'),
(52, 11, 0, 0, 0, 7, 1, '::1', 1, 34, '2022-01-25 11:05:56'),
(53, 11, 0, 0, 0, 7, 1, '::1', 1, 35, '2022-01-25 11:16:17'),
(54, 12, 0, 0, 0, 8, 1, '::1', 1, 36, '2022-01-25 12:26:12'),
(55, 7, 0, 0, 0, 8, 1, '39.50.162.61', 1, 37, '2022-01-25 08:10:05'),
(56, 11, 0, 0, 0, 7, 1, '39.50.162.61', 1, 38, '2022-01-25 09:08:54'),
(57, 12, 0, 0, 0, 8, 1, '39.50.162.61', 1, 38, '2022-01-25 09:08:54'),
(58, 13, 0, 0, 0, 3, 1, '39.50.162.61', 1, 38, '2022-01-25 09:08:55'),
(59, 12, 0, 0, 0, 8, 5, '39.50.162.61', 1, 39, '2022-01-25 09:13:59'),
(60, 13, 0, 0, 0, 3, 4, '39.50.162.61', 1, 39, '2022-01-25 09:13:59'),
(61, 11, 0, 0, 0, 7, 4, '39.50.162.61', 1, 39, '2022-01-25 09:13:59'),
(62, 11, 0, 0, 0, 7, 13, '39.50.162.61', 1, 40, '2022-01-25 09:17:00'),
(63, 13, 0, 0, 0, 3, 1, '::1', 1, 41, '2022-01-27 16:22:28'),
(65, 9, 0, 0, 0, 4, 2, '::1', 1, 41, '2022-01-27 16:22:28'),
(66, 8, 0, 0, 0, 8, 2, '::1', 1, 41, '2022-01-27 16:22:29'),
(69, 12, 0, 0, 0, 8, 1, '39.50.162.61', 1, 42, '2022-01-28 06:41:53'),
(71, 13, 0, 0, 0, 8, 1, '39.50.172.238', 0, 0, NULL),
(72, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 43, '2022-02-10 05:28:04'),
(73, 10, 0, 0, 0, 5, 1, '39.50.215.143', 1, 44, '2022-02-10 07:02:18'),
(74, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 45, '2022-02-10 07:29:06'),
(75, 9, 0, 0, 0, 4, 1, '39.50.215.143', 1, 46, '2022-02-10 07:36:42'),
(76, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 47, '2022-02-10 07:43:14'),
(77, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 48, '2022-02-10 08:29:03'),
(78, 13, 0, 0, 0, 8, 1, '39.50.215.143', 1, 49, '2022-02-10 08:35:16'),
(79, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 50, '2022-02-10 11:52:54'),
(80, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 51, '2022-02-10 12:00:27'),
(81, 11, 0, 0, 0, 8, 1, '39.50.215.143', 1, 52, '2022-02-10 13:24:11'),
(82, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 53, '2022-02-10 13:42:59'),
(83, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 54, '2022-02-11 05:27:54'),
(84, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 55, '2022-02-11 05:37:15'),
(85, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 56, '2022-02-11 05:39:18'),
(86, 11, 0, 0, 0, 8, 1, '39.50.215.143', 1, 57, '2022-02-11 05:41:03'),
(87, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 58, '2022-02-11 05:45:00'),
(88, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 59, '2022-02-11 05:46:41'),
(89, 11, 0, 0, 0, 8, 1, '39.50.215.143', 1, 60, '2022-02-11 05:50:31'),
(90, 13, 0, 0, 0, 8, 1, '39.50.215.143', 1, 61, '2022-02-11 05:57:27'),
(91, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 62, '2022-02-11 06:14:38'),
(92, 11, 0, 0, 0, 8, 1, '39.50.215.143', 1, 63, '2022-02-11 06:28:49'),
(93, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 64, '2022-02-11 07:06:30'),
(94, 13, 0, 0, 0, 8, 1, '39.50.215.143', 1, 65, '2022-02-14 13:35:48'),
(95, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 66, '2022-02-14 13:38:15'),
(96, 13, 0, 0, 0, 8, 1, '39.50.215.143', 1, 67, '2022-02-14 13:42:24'),
(97, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 68, '2022-02-14 13:45:22'),
(98, 12, 0, 0, 0, 8, 1, '39.50.215.143', 1, 69, '2022-02-14 13:49:46'),
(99, 9, 0, 0, 0, 4, 1, '39.50.215.143', 1, 70, '2022-02-21 08:05:16'),
(100, 13, 0, 0, 0, 8, 1, '39.50.173.211', 1, 71, '2022-03-08 11:02:00'),
(101, 13, 0, 0, 0, 8, 1, '39.50.173.211', 1, 72, '2022-03-08 11:11:46'),
(102, 13, 0, 0, 0, 8, 1, '39.50.173.211', 1, 73, '2022-03-08 11:14:07'),
(103, 13, 0, 0, 0, 8, 1, '39.50.173.211', 1, 74, '2022-03-08 11:15:12'),
(104, 13, 0, 0, 0, 8, 1, '39.50.173.211', 0, 0, NULL),
(105, 13, 0, 0, 0, 8, 1, '::1', 1, 75, '2022-03-08 19:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `categoryid`, `status`) VALUES
(1, 'Anal bleaching', 0, 1),
(2, 'Anti-aging cream', 0, 1),
(3, 'Anti-aging supplements', 0, 1),
(4, 'Baking (make-up)', 0, 1),
(5, 'Barbie Magic Hair Styler', 0, 1),
(6, 'BB cream', 0, 1),
(7, 'Bear\'s grease', 0, 1),
(8, 'Beard oil', 0, 1),
(9, 'Accessories', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `color_variation`
--

CREATE TABLE `color_variation` (
  `id` int(11) NOT NULL,
  `variation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color_variation`
--

INSERT INTO `color_variation` (`id`, `variation`) VALUES
(1, 'Gold'),
(2, 'Green'),
(3, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `msg`) VALUES
(1, 'Zaid', 'admin@gmail.com', '123456', 'Support', 'bye'),
(2, 'Zaid', 'v@gmail.com', '123456', 'BAUSWORLD', 'bye'),
(3, 'Zaid Iftikhar', 'zaidiftikhar27@gmail.com', '03142219159', 'Successfully Purchased', 'sca'),
(4, 'Zaid Iftikhar', 'zaidiftikhar27@gmail.com', '03142219159', 'Successfully Purchased', 'sca'),
(5, 'Safa IMRAN', 'SAFA@GMAIL.COM', '312456789', 'Contact | Nappy Life', '\r\nTesting\r\n'),
(6, 'Safa IMRAN', 'SAFA@GMAIL.COM', '312456789', 'Contact | Nappy Life', 'Testing'),
(7, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'esdassadsda wsada s sadas'),
(8, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'esdassadsda wsada s sadas'),
(9, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'fsgdfhj'),
(10, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'sasdfhgjkl'),
(11, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'dfghj'),
(12, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'scdfg'),
(13, 'Ibrahim Nawab', 'techcommando34@gmail.com', '6014635797', 'Contact | Nappy Life', 'scdfg');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `fr_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content`, `fr_content`) VALUES
(2, 'Q2FsbCBVcw==', ''),
(3, 'RW1haWw=', ''),
(4, 'TXkgQWNjb3VudA==', 'TW9uIGNvbXB0ZQ=='),
(5, 'QWRtaW4gRGFzaGJvYXJk', 'TW9uIGJvdWRvaXIg'),
(6, 'VXNlciBEYXNoYm9hcmQ=', 'TW9uIGJvdWRvaXIg'),
(7, 'U2lnbiBJbg==', 'UydpZGVudGlmaWVy'),
(8, 'U2lnbiB1cA==', 'UydpbnNjcmlyZQ=='),
(9, 'SG9tZQ==', 'ZG9taWNpbGU='),
(10, 'U2hvcA==', 'Qm91dGlxdWU='),
(11, 'QmxvZw==', 'VGVuZGFuY2Vz'),
(12, 'QWJvdXQgdXM=', 'Tm90cmUgSGlzdG9pcmU='),
(13, 'Q29udGFjdCBVcw==', 'UHJvZ3JhbW1lIGRlIGZpZMOpbGl0w6k='),
(14, 'Q2FydA==', 'TW9uIHBhbmllciA='),
(15, 'TG9nb3V0', 'U2UgZMOpY29ubmVjdGVy'),
(16, 'RnJvbSDigqw0MA==', 'TElWUkFJU09OIEdSQVRVSVRF'),
(17, 'RnJlZSBzaGlwcGluZyBvbiBhbGwgb3JkZXI=', 'IEEgcGFydGlyIGRlIDQw4oKs'),
(18, 'U2F0aXNmYWN0aW9uIGd1YXJhbnRlZWQ=', 'U2F0aXNmYWN0aW9uIEdhcmFudGll'),
(19, 'MzAgZGF5cyBtb25leSBiYWNr', 'MzAgam91cnMgZGUgcmVtYm91cnNlbWVudA=='),
(20, 'TW9uZGF5IHRvIEZyaWRheSAxMCBhLm0uIHRvIDYgcC5tLg==', 'U1VQUE9SVCBFTiBMSUdORQ=='),
(21, 'TW9uZGF5IHRvIEZyaWRheSAxMCBhLm0uIHRvIDYgcC5tLg==', 'THVuZGkgYXUgdmVuZHJlZGkgZGUgMTBoIMOgIDE4aA=='),
(22, 'U2V2ZXJhbCBwYXltZW50IG1ldGhvZHMgYXZhaWxhYmxl', 'UEFJRU1FTlQgMTAwJSBTRUNVUklU'),
(23, 'TGF0ZXN0IFRyZW5kaW5nIEFydGljbGVz', 'RGVybmllcnMgYXJ0aWNsZXMgdGVuZGFuY2U='),
(24, 'WW91IERvbuKAmXQgV2FudCBUbyBNaXNzIFRoaXM=', 'VHUgbmUgdmV1eCBwYXMgcmF0ZXIgw6dh'),
(25, 'VG8gTWlzcyBUaGlz', 'TWFucXVlciDDp2E='),
(26, 'TkVXU0xFVFRFUiBTSUdOIFVQ', 'SU5TQ1JJUFRJT04gw4AgTEEgTkVXU0xFVFRFUg=='),
(27, 'KEdldCAzMCUgT0ZGIGNvdXBvbiB0b2RheSBzdWJzY2liZXJzKQ==', 'KE9idGVuZXogMzAlIGRlIHLDqWR1Y3Rpb24gc3VyIGxlcyBhYm9ubsOpcyBhdWpvdXJkJ2h1aSk='),
(28, 'Tm90cmUgSGlzdG9pcmU=', 'Tm90cmUgSGlzdG9pcmU='),
(29, 'SWwgw6l0YWl0IHVuZSBmb2lzLCBkYW5zIHVuZSBwZXRpdGUgY2FtcGFnbmUgZGUgbOKAmUVzdCBQYXJpc2llbiwgdW5lIHBldGl0ZSBmaWxsZSBheWFudCB1bmUgbcOocmUgbcOpdGlzc2UgYXZlYyB1bmUgY2hldmVsdXJlIHJhZGljYWxlbWVudCBkaWZmw6lyZW50ZSBkZSBsYSBzaWVubmUuIEVsbGUgbmUgY29ubmFpc3NhaXQgYXVjdW5lIG3DqXRob2RlIHBvdXIgc29pZ25lciBzZXMgY2hldmV1eCwgbuKAmWF2YWl0IHBhcyBsZXMgcHJvZHVpdHMgYWRhcHTDqXMgcG91ciBsZXMgbm91cnJpci4=', 'SWwgw6l0YWl0IHVuZSBmb2lzLCBkYW5zIHVuZSBwZXRpdGUgY2FtcGFnbmUgZGUgbOKAmUVzdCBQYXJpc2llbiwgdW5lIHBldGl0ZSBmaWxsZSBheWFudCB1bmUgbcOocmUgbcOpdGlzc2UgYXZlYyB1bmUgY2hldmVsdXJlIHJhZGljYWxlbWVudCBkaWZmw6lyZW50ZSBkZSBsYSBzaWVubmUuIEVsbGUgbmUgY29ubmFpc3NhaXQgYXVjdW5lIG3DqXRob2RlIHBvdXIgc29pZ25lciBzZXMgY2hldmV1eCwgbuKAmWF2YWl0IHBhcyBsZXMgcHJvZHVpdHMgYWRhcHTDqXMgcG91ciBsZXMgbm91cnJpci4='),
(30, 'RMOpZnJpc2FnZSBhcHLDqHMgZMOpZnJpc2FnZSwgZWxsZSBzZSB0cm91dmFpdCB0b3VzIGxlcyBqb3VycyBhdmVjIGRlcyBjaGV2ZXV4IHNlY3MsIGRpZmZpY2lsZXMgw6AgY29pZmZlciBldCBtYWwgYWltw6lzLiA=', 'RMOpZnJpc2FnZSBhcHLDqHMgZMOpZnJpc2FnZSwgZWxsZSBzZSB0cm91dmFpdCB0b3VzIGxlcyBqb3VycyBhdmVjIGRlcyBjaGV2ZXV4IHNlY3MsIGRpZmZpY2lsZXMgw6AgY29pZmZlciBldCBtYWwgYWltw6lzLiAKCkzigJlleHDDqXJpZW5jZSwgbGUgYm91Y2hlIMOgIG9yZWlsbGUgZXQgbOKAmWVudG91cmFnZSBs4oCZb250IMOpbm9ybcOpbWVudCBhaWTDqWUgw6AgbWlldXggY29tcHJlbmRyZSBzZXMgY2hldmV1eC4gRXQgYXByw6hzIDIwIGFucyBkZSB0w6J0b25uZW1lbnRzLCBkZSByZWNoZXJjaGVzLCBlbGxlIHLDqXVzc2l0IMOgIHNvcnRpciBzb24gw6lwaW5nbGUgZHUgamV1IGV0IHPigJnDqXBhbm91aXIgYXZlYyBzYSBjaGV2ZWx1cmUgbmF0dXJlbGxlLg=='),
(31, 'VmlldyBXb3Jr', ''),
(32, 'MjE2OQ==', ''),
(33, 'SEFQUFkgQ1VTVE9NRVJT', ''),
(34, 'MzY5', ''),
(35, 'QVdBUkRTIFdJTk5FRA==', ''),
(36, 'Njg5', ''),
(37, 'SE9VUlMgV09SS0VE', ''),
(38, 'MjE2OQ==', ''),
(39, 'Q09NUExFVEUgUFJPSkVDVFM=', ''),
(40, 'TOKAmWV4cMOpcmllbmNlLCBsZSBib3VjaGUgw6Agb3JlaWxsZSBldCBs4oCZZW50b3VyYWdlIGzigJlvbnQgw6lub3Jtw6ltZW50IGFpZMOpZSDDoCBtaWV1eCBjb21wcmVuZHJlIHNlcyBjaGV2ZXV4LiBFdCBhcHLDqHMgMjAgYW5zIGRlIHTDonRvbm5lbWVudHMsIGRlIHJlY2hlcmNoZXMsIGVsbGUgcsOpdXNzaXQgw6Agc29ydGlyIHNvbiDDqXBpbmdsZSBkdSBqZXUgZXQgc+KAmcOpcGFub3VpciBhdmVjIHNhIGNoZXZlbHVyZSBuYXR1cmVsbGUu', 'TOKAmWV4cMOpcmllbmNlLCBsZSBib3VjaGUgw6Agb3JlaWxsZSBldCBs4oCZZW50b3VyYWdlIGzigJlvbnQgw6lub3Jtw6ltZW50IGFpZMOpZSDDoCBtaWV1eCBjb21wcmVuZHJlIHNlcyBjaGV2ZXV4LiBFdCBhcHLDqHMgMjAgYW5zIGRlIHTDonRvbm5lbWVudHMsIGRlIHJlY2hlcmNoZXMsIGVsbGUgcsOpdXNzaXQgw6Agc29ydGlyIHNvbiDDqXBpbmdsZSBkdSBqZXUgZXQgc+KAmcOpcGFub3VpciBhdmVjIHNhIGNoZXZlbHVyZSBuYXR1cmVsbGUu'),
(41, '', ''),
(42, 'VEVMTCBVUyBZT1VSIFBST0pFQ1Q=', ''),
(43, 'Q09OVEFDVCBVUw==', ''),
(44, 'Q2xhcml0YXMgZXN0IGV0aWFtIHByb2Nlc3N1cyBkeW5hbWljdXMsIHF1aSBzZXF1aXR1ciBtdXRhdGlvbmVtIGNvbnN1ZXR1ZGl1bSBsZWN0b3J1bS4gTWlydW0gZXN0IG5vdGFyZSBxdWFtIGxpdHRlcmEgZ290aGljYSwgcXVhbSBudW5jIHB1dGFtdXMgcGFydW0gY2xhcmFtIGFudGVwb3N1ZXJpdCBsaXR0ZXJhcnVtIGZvcm1hcyBodW1hbi4=', ''),
(45, 'UmV0dXJuaW5nIGN1c3RvbWVyPw==', ''),
(46, 'SGF2ZSBhIGNvdXBvbj8=', ''),
(47, 'QmlsbGluZyBEZXRhaWxz', ''),
(48, 'Q291bnRyeQ==', ''),
(49, 'Rmlyc3QgTmFtZQ==', ''),
(50, 'TGFzdCBOYW1l', ''),
(51, 'Q29tcGFueSBOYW1l', ''),
(52, 'QWRkcmVzcw==', ''),
(53, 'VG93biAvIENpdHk=', ''),
(54, 'U3RhdGUgLyBDb3VudHk=', ''),
(55, 'UG9zdGNvZGUgLyBaaXA=', ''),
(56, 'RW1haWwgQWRkcmVzcw==', ''),
(57, 'UGhvbmUg', ''),
(58, 'Q3JlYXRlIGFuIGFjY291bnQ/', ''),
(59, 'IFdoYXQgb3VyIGNsaWVudHMgc2F5', ''),
(60, 'UGFzc3dvcmQ=', ''),
(61, 'U2hpcCB0byBhIGRpZmZlcmVudCBhZGRyZXNzPw==', ''),
(62, 'Q291bnRyeQ==', ''),
(63, 'Rmlyc3QgTmFtZQ==', ''),
(64, 'TGFzdCBOYW1l', ''),
(65, 'Q29tcGFueSBOYW1l', ''),
(66, 'QWRkcmVzcyA=', ''),
(67, 'VG93biAvIENpdHk=', ''),
(68, 'U3RhdGUgLyBDb3VudHkg', ''),
(69, 'UG9zdGNvZGUgLyBaaXA=', ''),
(70, 'RW1haWwgQWRkcmVzcw==', ''),
(71, 'UGhvbmUg', ''),
(72, 'T3JkZXIgTm90ZXM=', ''),
(73, 'WU9VUiBPUkRFUg==', ''),
(74, 'UFJPRFVDVA==', ''),
(75, 'VE9UQUw=', ''),
(76, 'RGlyZWN0IEJhbmsgVHJhbnNmZXI=', ''),
(77, 'VmVzdGlidWx1bSBhYyBkaWFtIHNpdA==', ''),
(78, 'Q2hlcXVlIFBheW1lbnQ=', ''),
(79, 'VmVzdGlidWx1bSBhYyBkaWFtIHNpdA==', ''),
(80, 'UGF5UGFs', ''),
(81, 'VmVzdGlidWx1bSBhYyBkaWFtIHNpdA==', ''),
(82, 'SW1hZ2U=', ''),
(83, 'UHJvZHVjdA==', ''),
(84, 'UHJpY2U=', ''),
(85, 'UXVhbnRpdHk=', ''),
(86, 'VG90YWw=', ''),
(87, 'UmVtb3Zl', ''),
(88, 'Q0FSVCBUT1RBTFM=', ''),
(89, 'U1VCVE9UQUw=', 'U1VCVE9UQUw='),
(90, 'VE9UQUw=', 'bGUgdG90YWw='),
(91, 'UHJvY2VlZCB0byBDaGVja291dA==', 'UGFzc2VyIMOgIGxhIGNhaXNzZQ=='),
(92, 'QmVsb3cgYXJlIGZyZXF1ZW50bHkgYXNrZWQgcXVlc3Rpb25zLCB5b3UgbWF5IGZpbmQgdGhlIGFuc3dlciBmb3IgeW91cnNlbGY=', '56eB44Gf44Gh44Gu44OB44O844Og'),
(93, 'TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gRG9uZWMgaWQgZXJhdCBzYWdpdHRpcywgZmF1Y2lidXMgbWV0dXMgbWFsZXN1YWRhLCBlbGVpZmVuZCB0dXJwaXMuIE1hdXJpcyBzZW1wZXIgYXVndWUgaWQgbmlzbCBhbGlxdWV0LCBhIHBvcnRhIGxlY3R1cyBtYXR0aXMuIE51bGxhIGF0IHRvcnRvciBhdWd1ZS4gSW4gZWdldCBlbmltIGRpYW0uIERvbmVjIGdyYXZpZGEgdG9ydG9yIHNlbSwgYWMgZmVybWVudHVtIG5pYmggcnV0cnVtIHNpdCBhbWV0LiBOdWxsYSBjb252YWxsaXMgbWF1cmlzIHZpdGFlIGNvbmd1ZSBjb25zZXF1YXQuIERvbmVjIGludGVyZHVtIG51bmMgcHVydXMsIHZpdGFlIHZ1bHB1dGF0ZSBhcmN1IGZyaW5naWxsYSBxdWlzLiBWaXZhbXVzIGlhY3VsaXMgZXVpc21vZCBkdWku', '44Os44OT44Ol44O8'),
(94, 'TWF1cmlzIGNvbmd1ZSBldWlzbW9kIHB1cnVzIGF0IHNlbXBlci4gTW9yYmkgZXQgdnVscHV0YXRlIG1hc3NhPw==', '44OW44Ot44Kw'),
(95, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', '6YCj57Wh44GZ44KL'),
(96, 'RG9uZWMgbWF0dGlzIGZpbmlidXMgZWxpdCB1dCB0cmlzdGlxdWU/', '44Ot44Kw44Kk44Oz'),
(97, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', '44GK5a6i5qeY44Gu5aOw44CC'),
(98, 'VmVzdGlidWx1bSBhIGxvcmVtIHBsYWNlcmF0LCBwb3J0dGl0b3IgdXJuYSB2ZWw/', '44OA44OD44K344Ol44Oc44O844OJ'),
(99, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(100, 'QWVuZWFuIGVsaXQgb3JjaSwgZWZmaWNpdHVyIHF1aXMgbmlzbCBhdCwgYWNjdW1zYW4/', ''),
(101, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(102, 'UGVsbGVudGVzcXVlIGhhYml0YW50IG1vcmJpIHRyaXN0aXF1ZSBzZW5lY3R1cyBldCBuZXR1cz8=', ''),
(103, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(104, 'TmFtIHBlbGxlbnRlc3F1ZSBhbGlxdWFtIG1ldHVzPw==', ''),
(105, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(106, 'QWVuZWFuIGVsaXQgb3JjaSwgZWZmaWNpdHVyIHF1aXMgbmlzbCBhdD8=', ''),
(107, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(108, 'TW9yYmkgZ3JhdmlkYSwgbmlzaSBpZCBmcmluZ2lsbGEgdWx0cmljaWVzLCBlbGl0IGxvcmVtPw==', ''),
(109, 'QW5pbSBwYXJpYXR1ciBjbGljaGUgcmVwcmVoZW5kZXJpdCwgZW5pbSBlaXVzbW9kIGhpZ2ggbGlmZSBhY2N1c2FtdXMgdGVycnkgcmljaGFyZHNvbiBhZCBzcXVpZC4gMyB3b2xmIG1vb24gb2ZmaWNpYSBhdXRlLCBub24gY3VwaWRhdGF0IHNrYXRlYm9hcmQgZG9sb3IgYnJ1bmNoLiBGb29kIHRydWNrIHF1aW5vYSBuZXNjaXVudCBsYWJvcnVtIGVpdXNtb2QuIEJydW5jaCAzIHdvbGYgbW9vbiB0ZW1wb3IsIHN1bnQgYWxpcXVhIHB1dCBhIGJpcmQgb24gaXQgc3F1aWQgc2luZ2xlLW9yaWdpbiBjb2ZmZWUgbnVsbGEgYXNzdW1lbmRhIHNob3JlZGl0Y2ggZXQuIE5paGlsIGFuaW0ga2VmZml5ZWggaGVsdmV0aWNhLCBjcmFmdCBiZWVyIGxhYm9yZSB3ZXMgYW5kZXJzb24gY3JlZCBuZXNjaXVudCBzYXBpZW50ZSBlYSBwcm9pZGVudC4gQWQgdmVnYW4gZXhjZXB0ZXVyIGJ1dGNoZXIgdmljZSBsb21vLiBMZWdnaW5ncyBvY2NhZWNhdCBjcmFmdCBiZWVyIGZhcm0tdG8tdGFibGUsIHJhdyBkZW5pbSBhZXN0aGV0aWMgc3ludGggbmVzY2l1bnQgeW91IHByb2JhYmx5IGhhdmVuJ3QgaGVhcmQgb2YgdGhlbSBhY2N1c2FtdXMgbGFib3JlIHN1c3RhaW5hYmxlIFZIUy4=', ''),
(110, 'SXQgaGFzIGZpbmFsbHkgc3RhcnRlZC4uLg==', ''),
(111, 'SHVnZSBzYWxlIHVwIHRv', ''),
(112, 'NDAlIE9GRg==', ''),
(113, 'c2hvcCBub3c=', ''),
(114, 'U2xlZXAgUHJvZ3JhbSBNdXNpYw==', ''),
(115, 'U3Vic2NyaWJl', ''),
(116, 'SG9tZQ==', ''),
(117, 'QWJvdXQ=', ''),
(118, 'UmVsYXhpbmcgTXVzaWM=', ''),
(119, 'VXBsaWZpdGluZyBNdXNpYw==', ''),
(120, 'VGF4', 'aW1ww7R0'),
(121, 'Tm93IFlvdSBTZWUgWW91ciBJbnZvaWNlIGluIFRoZSBPcmRlciBEZXRhaWxzIFRhYg==', ''),
(122, 'VG90YWwgRWFybiBQb2ludHM6', ''),
(123, 'UG9pbnRzIFN0YXR1czo=', ''),
(124, 'Tm93IFlvdSBjYW4gUGxhY2UgWW91ciBPcmRlciBTdWNjZXNzZnVsbHkgQW5kIFN0YXJ0IEVhcm5pbmcgWW91ciBQb2ludHMgVG8gR2V0IEJlbmlmaXRz', ''),
(125, 'Q2FydCBTdWJ0b3RhbA==', ''),
(126, 'VGF4Cg==', ''),
(127, 'T3JkZXIgVG90YWw=', ''),
(128, 'Q2xpY2sgaGVyZSB0byBlbnRlciB5b3VyIGNvZGU=', ''),
(129, 'Q2xpY2sgaGVyZSB0byBsb2dpbg==', ''),
(130, 'WW91ciBQZXJzb25hbCBEZXRhaWxz', 'Vm90cmUgcHJvZmlsIA=='),
(131, 'RW1haWwgYWRkcmVzcw==', 'Vm90cmUgZW1haWwg'),
(132, 'QmFjaw==', 'UHLDqWPDqWRlbnQ='),
(133, 'bmV3IGN1c3RvbWVy', 'Tm91dmVhdSBjbGllbnQ='),
(134, 'WW91IGFyZSBuZXcgdG8KTmFwcHlsaWZlPw==', 'Vm91cyDDqnRlcyBub3V2ZWF1IHN1ciAKTmFwcHlsaWZlPw=='),
(135, 'Q3JlYXRlIHlvdXIgYWNjb3VudCBmb3IKZW5qb3kgYWxsIHRoZSBiZW5lZml0cyBhbmQKam9pbiBvdXIgcHJvZ3JhbQpsb3lhbHR5IGZyb20geW91ciBmaXJzdCBwdXJjaGFzZQ==', 'Q3LDqWV6IHZvdHJlIGNvbXB0ZSBwb3VyIApwcm9maXRlciBkZSB0b3VzIGxlcyA='),
(136, 'Y29udGludWU=', 'UydlbnJlZ2lzdHJlcg=='),
(137, 'QWxyZWFkeSBhIE5hcHB5bGlmZSBjdXN0b21lcj8=', 'RMOpasOgIGNsaWVudCBOYXBweWxpZmU/IA=='),
(138, '', ''),
(139, 'RW50ZXIgCnlvdXIgZW1haWwgYWRyZXNz', 'RW50cmV6IHZvdHJlIGFkcmVzc2UgbWFpbA=='),
(140, 'UGFzc3dvcmQg', 'TW90IGRlIHBhc3M='),
(141, 'Rm9yZ290IHBhc3N3b3JkwqA/', 'TW90IGRlIHBhc3NlIG91Ymxpw6k='),
(142, 'Rmlyc3QgTmFtZQ==', 'UHLDqW5vbSA='),
(143, 'TGFzdCBOYW1l', 'Tm9tIA=='),
(144, 'RW1haWwgYWRkcmVzcw==', 'RW1haWwg'),
(145, 'R2VuZGVy', 'R2VucmUg'),
(146, 'RmVtYWxl', 'RmVtbWUg'),
(147, 'VGVsZXBob25l', 'TnVtw6lybyBkZSB0w6lsw6lwaG9uZQ=='),
(148, 'UHJvZmlsZSBQaWM=', 'UGhvdG8gZGUgcHJvZmls'),
(149, 'WW91ciBQYXNzd29yZA==', ''),
(150, 'UGFzc3dvcmQK', 'Vm90cmUgbW90IGRlIHBhc3Nl'),
(151, 'Q29uZmlybSBQYXNzd29yZA==', 'Q29uZmlybWV6IHZvdHJlIG1vdCBkZSBwYXNz'),
(152, 'QWRkcmVzcw==', ''),
(153, 'QWRkcmVzcwo=', 'Vm90cmUgYWRyZXNzZSBwb3N0YWxl'),
(154, 'Q291bnRyeQ==', 'UGF5cyA='),
(155, 'Q2l0eQ==', 'VmlsbGUg'),
(156, 'WmlwIENvZGUKCg==', 'Q29kZSBwb3N0YWwg'),
(157, 'U3RhdGUK', 'UsOpZ2lvbg=='),
(158, 'TWFsZQ==', 'SG9tbWU='),
(159, 'TmV3c2xldHRlcg==', ''),
(160, 'U3Vic2NyaWJl', 'Vm91bGV6LXZvdXMgdm91cyBpbnNjcmlyZSDDoCBsYSBuZXdzbGV0dGVy'),
(161, 'WWVz', 'T3Vp'),
(162, 'Tm8=', 'Tm9uIA=='),
(163, 'UmVnaXN0ZXI=', 'U+KAmWVucmVnaXN0cmVy'),
(164, 'QUxMIENBVEVHT1JJRVM=', ''),
(165, 'Q2F0ZWdvcmllcwo=', ''),
(166, 'TXkgQWNjb3VudA==', ''),
(167, 'SG9tZQ==', 'QWNjdWVpbCA='),
(168, 'T3JkZXIgRGV0YWlscw==', 'RMOpdGFpbCBkZXMgY29tbWFuZGVzIA=='),
(169, 'UHJvZmlsZSBVcGRhdGU=', 'TW9uIHByb2ZpbCA='),
(170, 'Q2hhbmdlIFBhc3N3b3Jk', 'Q2hhbmdlbWVudCBkdSBtb3QgZGUgcGFzc2Ug'),
(171, 'TG9nb3V0', 'RMOpY29ubmV4aW9u'),
(172, 'RGFzaGJvYXJk', ''),
(173, 'UGF1c2U=', ''),
(174, 'Rmlyc3QgTmFtZQ==', 'UHLDqW5vbSA='),
(175, 'TGFzdCBOYW1l', 'Tm9tIA=='),
(176, 'RW1haWw=', 'RW1haWwg'),
(177, 'UGhvbmU=', 'TnVtw6lybyA='),
(178, 'QWRkcmVzcw==', 'QWRyZXNzZSA='),
(179, 'Q291bnRyeQ==', 'UGF5cyA='),
(180, 'VXBkYXRlIFByb2ZpbGU=', 'TWV0dHJlIMOgIGpvdXIgbGUgcHJvZmlsIA=='),
(181, 'WW91IE1heSBBbHNvIExpa2U=', 'Q2hhbmdlbWVudCBkZSBtb3QgZGUgcGFzc2Ug'),
(182, 'Q3VycmVudCBQYXNzd29yZA==', 'Q2hhbmdlbWVudCBkZSBtb3QgZGUgcGFzc2Ug'),
(183, 'TmV3IFBhc3N3b3Jk', 'Tm91dmVhdSBtb3QgZGUgcGFzc2Ug'),
(184, 'Q29uZmlybSBQYXNzd29yZA==', 'Q29uZmlybWF0aW9uIGR1IG5vdXZlYXUgbW90IGRlIHBhc3NlIA=='),
(185, 'Q2hhbmdlIFBhc3N3b3Jk', 'Q2hhbmdlciBsZSBtb3QgZGUgcGFzc2Ug'),
(186, 'U3IgTm8=', 'TnVtw6lybyBkZSBjb21tYW5kZSA='),
(187, 'SW52b2ljZSBOdW1iZXI=', 'TnVtw6lybyBkZSBmYWN0dXJlIA=='),
(188, 'VXNlciBOYW1l', ''),
(189, 'VXNlciBFbWFpbA==', ''),
(190, 'UGF5bWVudCBNZXRob2Q=', 'TW9kZSBkZSByw6hnbGVtZW50IA=='),
(191, 'VmlldyBEZXRhaWxz', 'RMOpdGFpbHMg'),
(192, 'UmVsZWFzZWQ=', ''),
(193, 'UGxheSBMYXRlc3QgQWxidW0=', ''),
(194, 'UGF1c2U=', ''),
(195, 'Iw==', ''),
(196, 'U29uZyBUaXRsZQ==', ''),
(197, 'QXJ0aXN0', ''),
(198, 'RHVyYXRpb24=', ''),
(199, 'QWRkIFRvIEZhdm91cml0ZXM=', ''),
(200, 'UHJldmlvdXMgQWxidW1z', ''),
(201, 'TmV3bHkgUmVsZWFzZWQgQWxidW1z', ''),
(202, 'VG9wIEFydGlzdHM=', ''),
(203, 'TmV3bHkgUmVsZWFzZWQgQWxidW1z', ''),
(204, 'U3RhcnM=', ''),
(205, 'Q29tbWVudHM=', ''),
(206, 'Q29tbWVudHM=', ''),
(207, 'TGVhdmUgQSBDb21tZW50', ''),
(208, 'UmVjZW50IFBvc3Rz', ''),
(209, 'Q2F0ZWdvcmllcw==', ''),
(210, 'WW91ciBGYXZvdXJpdGVz', ''),
(211, 'Iw==', ''),
(212, 'U29uZyBUaXRsZQ==', ''),
(213, 'QXJ0aXN0', ''),
(214, 'RHVyYXRpb24=', ''),
(215, 'UmVtb3Zl', ''),
(216, 'dmlldyBtb3Jl', ''),
(217, 'Iw==', ''),
(218, 'U29uZyBUaXRsZQ==', ''),
(219, 'QXJ0aXN0', ''),
(220, 'RHVyYXRpb24=', ''),
(221, 'QWRkIFRvIEZhdm91cml0ZXM=', ''),
(222, 'Y29tbWVudHM=', ''),
(223, 'TGVhdmUgQSBDb21tZW50', ''),
(224, 'YWRkIGNvbW1lbnQ=', ''),
(225, 'WW91IE1heSBBbHNvIExpa2U=', ''),
(226, 'QWRkIFRvIEZhdm91cml0ZXM=', ''),
(227, 'QWRkIFRvIFBsYXlsaXN0', ''),
(228, 'TmV3bHkgUmVsZWFzZWQgQWxidW1z', ''),
(229, 'RGVzY3JpcHRpb24=', ''),
(230, 'QWxsIEdlbnJlcw==', ''),
(231, 'U29uZ3MgTGlzdA==', ''),
(232, 'QWRkIFRvIEZhdm91cml0ZXM=', ''),
(233, 'QWRkIFRvIFF1ZXVl', ''),
(234, 'QWRkIFRvIFBsYXlsaXN0', ''),
(235, 'U29uZ3MgQWxidW1z', ''),
(236, 'dmlldyBtb3Jl', ''),
(237, 'U3Vic2NyaXB0aW9uIFBsYW4gT3ZlcnZpZXc=', ''),
(238, 'WW91ciBTdWJzY3JpYmVkIFBsYW4=', ''),
(239, 'QW1vdW50IFBhaWQ=', ''),
(240, 'VmFsaWRpdHkgRXhwaXJlcyBJbg==', ''),
(241, 'UGxhbiBTdWJzY3JpYmUgRGF0ZQ==', ''),
(242, 'QWN0aXZlIE5vdw==', ''),
(243, 'WW91ciBQbGF5bGlzdHM=', ''),
(244, 'Iw==', ''),
(245, 'U29uZyBUaXRsZQ==', ''),
(246, 'QXJ0aXN0', ''),
(247, 'RHVyYXRpb24=', ''),
(248, 'cmVtb3Zl', ''),
(249, 'dmlldyBtb3Jl', ''),
(250, 'V2Vla2x5IFRvcCAxNQ==', ''),
(251, 'QWRkIFRvIEZhdm91cml0ZXM=', ''),
(252, 'QWRkIFRvIFF1ZXVl', ''),
(253, 'QWRkIFRvIFBsYXlsaXN0', ''),
(254, 'VG9wIFRyYWNrcyBPZiBBbGwgVGltZQ==', ''),
(255, 'VHJlbmRpbmcgVHJhY2tz', ''),
(256, 'VGhpcyBNb250aOKAmXM=', ''),
(257, 'UmVjb3JkIEJyZWFraW5nIEFsYnVtcyAh', ''),
(258, 'RHJlYW0geW91ciBtb21lbnRzLCBVbnRpbCBJIE1ldCBZb3UsIEdpbW1lIFNvbWUgQ291cmFnZSwgRGFyayBBbGxleSwgT25lIE1vcmUgT2YgQSBTdHJhbmdlciwgRW5kbGVzczxicj4gVGhpbmdzLCBUaGUgSGVhcnRiZWF0IFN0b3BzLCBXYWxraW5nIFByb21pc2VzLCBEZXNpcmVkIEdhbWVzIGFuZCBtYW55IG1vcmUuLi4=', ''),
(259, 'TGlzdGVuIE5vdw==', ''),
(260, 'VG9wIFdhdGNoZWQgVmlkZW9z', ''),
(261, 'VG9wIDE1IE11c2lj', ''),
(262, 'VmlldyBBbGJ1bXMgYnkgQXJ0aXN0cw==', ''),
(263, 'TmV3bHkgUmVsZWFzZWQgQWxidW1z', ''),
(264, 'RmVhdHVyZWQgQWxidW1z', ''),
(265, 'dmlldyBtb3Jl', ''),
(266, 'VG9wIEdlbnJlcw==', ''),
(267, 'dmlldyBtb3Jl', ''),
(268, 'VmlkZW9zIExpc3Q=', ''),
(269, 'U29uZ3MgQWxidW1z', ''),
(270, 'dmlldyBtb3Jl', ''),
(271, 'bWlyYWN1bG91cyBtdXNpYyBzdGF0aW9u', ''),
(272, 'Zm9sbG93IHVzIDo=', ''),
(273, 'c3Vic2NyaWJl', ''),
(274, 'U3Vic2NyaWJlIHRvIG91ciBuZXdzbGV0dGVyIGFuZCBnZXQgbGF0ZXN0IHVwZGF0ZXMgYW5kIG9mZmVycy4=', ''),
(275, 'U3Vic2NyaWJl', ''),
(276, 'Y29udGFjdCB1cw==', ''),
(277, 'Q2FsbCB1cyA6', ''),
(278, 'ZW1haWwgdXMgOg==', ''),
(279, 'd2FsayBpbiA6', ''),
(280, 'Q29weXJpZ2h0ICZjb3B5Ow==', ''),
(281, 'QWxsIFJpZ2h0cyBSZXNlcnZlZC4=', ''),
(282, 'UmVjZW50IEJsb2dz', ''),
(283, 'U2V0dGluZw==', ''),
(284, 'QmllbnZlbnVlIGRhbnMgdm90cmUgTmFwcHlsaWZlIGV0IGJvbm5lIGxlY3R1cmUu', 'QmllbnZlbnVlIGRhbnMgdm90cmUgTmFwcHlsaWZlIGV0IGJvbm5lIGxlY3R1cmUu'),
(285, 'Ck5vdXMgYXZvbnMgcG91ciB2b2NhdGlvbiBkZSBwYXJ0YWdlciBub3RyZSBwYXNzaW9uLCB0cmFuc21ldHRyZSB1biBwYXRyaW1vaW5lIHBvdXIgbGVzIGfDqW7DqXJhdGlvbnMgZnV0dXJlcyBldCBub3VzIGNyw6lvbnMgdW4gZW52aXJvbm5lbWVudCBkYW5zIGxlcXVlbCBjaGFxdWUgcGVyc29ubmUgZXN0IHVuaXF1ZSBldCB2YWxvcmlzw6llLg==', 'Ck5vdXMgYXZvbnMgcG91ciB2b2NhdGlvbiBkZSBwYXJ0YWdlciBub3RyZSBwYXNzaW9uLCB0cmFuc21ldHRyZSB1biBwYXRyaW1vaW5lIHBvdXIgbGVzIGfDqW7DqXJhdGlvbnMgZnV0dXJlcyBldCBub3VzIGNyw6lvbnMgdW4gZW52aXJvbm5lbWVudCBkYW5zIGxlcXVlbCBjaGFxdWUgcGVyc29ubmUgZXN0IHVuaXF1ZSBldCB2YWxvcmlzw6llLg=='),
(286, '', ''),
(287, 'QXUgZmlsIGR1IHRlbXBzLCBmb3JjZSBlc3QgZGUgY29uc3RhdGVyIHF1ZSBiZWF1Y291cCBzb250IGRhbnMgY2V0dGUgc2l0dWF0aW9uLiBNYWlzIMOgIHByw6lzZW50IG5vdXMgc29tbWVzIMOgIHZvcyBjw7R0w6lzIHBvdXIgdm91cyBhY2NvbXBhZ25lci4gVm91cyB0cm91dmVyZXogaWNpIHVuZSBtaW5lIGTigJlpbmZvcm1hdGlvbiwgbGEgYmlibGUgZGVzIGluZm9ybWF0aW9ucyBjYXBpbGxhaXJlcyBldCBzdXJ0b3V0IHZvdHJlIGNvYWNoIHBlcnNvbm5hbGlzw6ku', 'QXUgZmlsIGR1IHRlbXBzLCBmb3JjZSBlc3QgZGUgY29uc3RhdGVyIHF1ZSBiZWF1Y291cCBzb250IGRhbnMgY2V0dGUgc2l0dWF0aW9uLiBNYWlzIMOgIHByw6lzZW50IG5vdXMgc29tbWVzIMOgIHZvcyBjw7R0w6lzIHBvdXIgdm91cyBhY2NvbXBhZ25lci4gVm91cyB0cm91dmVyZXogaWNpIHVuZSBtaW5lIGTigJlpbmZvcm1hdGlvbiwgbGEgYmlibGUgZGVzIGluZm9ybWF0aW9ucyBjYXBpbGxhaXJlcyBldCBzdXJ0b3V0IHZvdHJlIGNvYWNoIHBlcnNvbm5hbGlzw6ku'),
(288, 'SG9tZQ==', ''),
(289, 'U3VwcG9ydA==', ''),
(290, 'U3VwcG9ydHM=', ''),
(291, 'TGVuZ3Ro', ''),
(292, 'U2l6ZQ==', ''),
(293, 'Q29sb3I=', ''),
(294, 'RmlsdGVyIGJ5IHByaWNl', 'RmlsdHJlciBwYXIgbGUgcHJpeA=='),
(295, 'Q2F0ZWdvcmllcw==', 'Q2F0w6lnb3JpZXM='),
(296, 'QWxsIENhdGVnb3JpZXM=', 'TGVzIHByb2R1aXRzIGRpc3BvbmlibGVzwqA='),
(297, 'V2Ugd29yayBjb2xsZWN0aXZlbHkgdG8gdHJhbnNtaXQgb3VyIHBhc3Npb24uCldlIHBhc3Mgb24gYSBoZXJpdGFnZSBmb3IgZnV0dXJlIGdlbmVyYXRpb25zLgpXZSBkZW1vbnN0cmF0ZSBob25lc3R5IGFuZCB0b3RhbCB0cmFuc3BhcmVuY3kgYW5kIHNhdGlzZnkgb3VyIGN1c3RvbWVycyB3aXRoIGEgcm91dGluZSBhbmQgcHJvZHVjdHMgYWRhcHRlZCB0byBlYWNoIHByb2ZpbGUuCkZpbmFsbHksIHdlIGNyZWF0ZSBhbiBlbnZpcm9ubWVudCBpbiB3aGljaCBlYWNoIHBlcnNvbiBpcyB1bmlxdWUgYW5kIHZhbHVlZC4=', 'Tm91cyB0cmF2YWlsbG9ucyBjb2xsZWN0aXZlbWVudCBwb3VyIHRyYW5zbWV0dHJlIG5vdHJlIHBhc3Npb24uCk5vdXMgdHJhbnNtZXR0b25zIHVuIHBhdHJpbW9pbmUgcG91ciBsZXMgZ8OpbsOpcmF0aW9ucyBmdXR1cmVzLgpOb3VzIGZhaXNvbnMgcHJldXZlIGTigJlob25uw6p0ZXTDqSBldCB0b3RhbGUgdHJhbnNwYXJlbmNlIGV0IHNhdGlzZmFpcmUgbm9zIGNsaWVudGVzIGF2ZWMgdW5lIHJvdXRpbmUgZXQgZGVzIHByb2R1aXRzIGFkYXB0w6lzIMOgIGNoYXF1ZSBwcm9maWwKRW5maW4sIG5vdXMgY3LDqW9ucyB1biBlbnZpcm9ubmVtZW50IGRhbnMgbGVxdWVsIGNoYXF1ZSBwZXJzb25uZSBlc3QgdW5pcXVlIGV0IHZhbG9yaXPDqWUuCg=='),
(298, 'UXVpeg==', ''),
(299, 'UXVpeg==', 'RS1kaWFnbm9zdGlj'),
(300, 'UXVpeiBSZXN1bHQ=', ''),
(301, 'UXVpeiBSZXN1bHQ=', ''),
(302, 'VHJhY2sgT3JkZXI=', 'U3VpdmkgZGUgY29tbWFuZGUg'),
(303, 'VHJhY2sgb3JkZXI=', 'U3VpdmkgZGUgY29tbWFuZGUg'),
(304, 'WW91', 'Vm91cw=='),
(305, 'YmVjb21lIGEgbWVtYmVy', 'IGRldmVuZXogbWVtYnJl'),
(306, 'ZnJvbSB5b3VyIGZpcnN0IG9yZGVyIQ==', 'ZMOocyB2b3RyZSBwcmVtacOocmUgY29tbWFuZGUgIQ=='),
(307, 'VGhlIG1vcmUgeW91IGJ1eSB0aGUgbW9yZSBwb2ludHMgYW5kIGJlbmVmaXRzIHlvdSBnZXQu', 'UGx1cyB2b3VzIGFjaGV0ZXosIHBsdXMgdm91cyBvYnRlbmV6IGRlIHBvaW50cyBldCBkJiMwMzk7YXZhbnRhZ2VzLg=='),
(308, 'Sm9pbiB1cyBhbmQgZGlzY292ZXIgeW91ciBhZHZhbnRhZ2VzIG5vdyE=', 'UmVqb2lnbmV6LW5vdXMgZXQgZMOpY291dnJleiBkw6hzIG1haW50ZW5hbnQgdm9zIGF2YW50YWdlcyAh'),
(309, 'c3RhdHVzZXMgYXZhaWxhYmxlIGRlcGVuZGluZyBvbiB0aGUgcG9pbnRzIGFjY3VtdWxhdGVk', 'c3RhdHV0cyBkaXNwb25pYmxlcyBlbiBmb25jdGlvbiBkZXMgcG9pbnRzIGFjY3VtdWzDqXM='),
(310, 'RWxmID0g', 'RWxmZSA9'),
(311, 'Jmd0Ow==', 'Jmd0Ow=='),
(312, 'cG9pbnRz', 'cG9pbnRz'),
(313, 'TnltcGggPQ==', 'TnltcGhlID0='),
(314, 'cG9pbnRzICZndDs=', 'cG9pbnQgJmd0Ow=='),
(315, 'cG9pbnRz', 'cG9pbnRz'),
(316, 'R29kZGVzcyAmZ3Q7', 'RMOpZXNzZSZndDs='),
(317, 'cG9pbnRz', 'cG9pbnRz'),
(318, 'Rm9yIHB1cmNoYXNlcyBvZg==', 'UG91ciBsZXMgYWNoYXRzIGRl'),
(319, '4oKsIHRv', '4oKsIMOg'),
(320, 'IOKCrCB5b3UgYWNjdW11bGF0ZSAxIHBvaW50IGZvciBlYWNoIGV1cm8gc3BlbnQ=', '4oKsIHZvdXMgY3VtdWxleiAxIHBvaW50IHBvdXIgY2hhcXVlIGV1cm8gZMOpcGVuc8Op'),
(321, 'Rm9yIHB1cmNoYXNlcyZndDs=', 'UG91ciBsZXMgYWNoYXRzJmd0Ow=='),
(322, 'IOKCrCB5b3UgYWNjdW11bGF0ZSAyIHBvaW50cyBmb3IgZWFjaCBldXJvIHNwZW50Cg==', '4oKsIHZvdXMgY3VtdWxleiAyIHBvaW50cyBwb3VyIGNoYXF1ZSBldXJvIGTDqXBlbnPDqQ=='),
(323, 'SWYgdGhlcmUgYXJlIG5vIG9yZGVycyBwbGFjZWQgZm9yIDEyIGNvbnNlY3V0aXZlIG1vbnRocywgeW91IGZvcmZlaXQgeW91ciBiZW5lZml0cy4=', 'U2kgYXVjdW5lIGNvbW1hbmRlIG4mIzAzOTtlc3QgcGFzc8OpZSBwZW5kYW50IDEyIG1vaXMgY29uc8OpY3V0aWZzLCB2b3VzIHBlcmRleiB2b3MgYXZhbnRhZ2VzLg=='),
(324, 'dfgsdg', ''),
(325, 'sdfgdsgf', ''),
(326, 'sdfgsg', ''),
(327, 'sdgfd', 'sdfgs'),
(328, 'dsfgs', 'sfgsg'),
(329, 'dsfgs', ''),
(330, 'dfgs', ''),
(331, 'sdfgs', ''),
(332, 'sdfg', ''),
(333, 'sdfgs', ''),
(334, 'Q2FwYWNpdHk=', 'Q2FwYWNpdMOp'),
(335, 'RGVsaXZlcnkgY29zdHMgb2ZmZXJlZCBmcm9tIDQw4oKsIG9mIHB1cmNoYXNl', 'RnJhaXMgZGUgbGl2cmFpc29uIG9mZmVydHMgw6AgcGFydGlyIGRlIDQw4oKsIGTigJlhY2hhdA=='),
(336, 'TkVXIEFSUklWQUw=', 'Tk9VVkVBVVggUFJPRFVJVFM='),
(337, 'RkVBVFVSRUQgUFJPRFVDVFM=', 'QkVTVCBTRUxMRVI='),
(338, 'VmlldyBEZXRhaWxz', 'Vm9pciBsZXMgZMOpdGFpbHMK'),
(339, 'UmVzdWx0cw==', 'UsOpc3VsdGF0cw=='),
(340, 'UHJvZHVjdCBkZXRhaWw=', 'RMOpdGFpbCBwcm9kdWl0IA=='),
(341, 'SW5ncmVkaWVudA==', 'SW5ncmVkaWVudA=='),
(342, 'VXNl', 'Q29uc2VpbCBk4oCZdXRpbGlzYXRpb24='),
(343, 'Q0FQQUNJVFk=', 'Q2FwYWNpdMOp'),
(344, 'cXVhbnRpdHk=', 'UXVhbnRpdMOp'),
(345, 'QWRkIHRvIGNhcnQ=', 'QWpvdXRlciBhdSBwYW5pZXI='),
(346, 'TG95YWx0eSBQcm9ncmFt', 'UFJPR1JBTU1FIERFIEZJRMOJTElUw4k='),
(347, 'TGl2cmFpc29uIGdyYXR1aXRl', 'TGl2cmFpc29uIGdyYXR1aXRl'),
(348, 'Q2FkZWF1IGTigJlhbm5pdmVyc2FpcmU=', 'Q2FkZWF1IGTigJlhbm5pdmVyc2FpcmU='),
(349, 'LTE1JSBzdXIgbGVzIGFjY2Vzc29pcmVz', 'LTE1JSBzdXIgbGVzIGFjY2Vzc29pcmVz'),
(350, 'LTUlIHN1ciBsZXMgcGFja3M=', 'LTUlIHN1ciBsZXMgcGFja3M='),
(351, 'Sm91cm7DqWVzIHByaXbDqWVz', 'Sm91cm7DqWVzIHByaXbDqWVz'),
(352, 'MSwgMiBvdSAzIHByb2R1aXRzIHRlc3RzIG9mZmVydHMvIGFu', 'MSwgMiBvdSAzIHByb2R1aXRzIHRlc3RzIG9mZmVydHMvIGFu'),
(353, '', ''),
(354, 'RWxmZQ==', 'RWxmZQ=='),
(355, 'TnltcGhl', 'TnltcGhl'),
(356, 'RMOpZXNzZQ==', 'RMOpZXNzZQ=='),
(357, 'TGl2cmFpc29uIEdyYXR1aXRl', 'TGl2cmFpc29uIEdyYXR1aXRl'),
(358, 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA==', 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA=='),
(359, 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA==', 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA=='),
(360, 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA==', 'QSBwYXJ0aXIgZGUgNDDigqwgIGTigJlhY2hhdA=='),
(361, 'UHJvZHVpdCBUZXN0IE9mZmVydA==', 'UHJvZHVpdCBUZXN0IE9mZmVydA=='),
(362, 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0', 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0'),
(363, 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0', 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0'),
(364, 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0', 'MSBwcm9kdWl0IHRlc3Qgb2ZmZXJ0'),
(365, 'Sm91cm7DqWVzIFByaXbDqWVz', 'Sm91cm7DqWVzIFByaXbDqWVz'),
(366, '', ''),
(367, '', ''),
(368, '', ''),
(369, 'MTUlIGRlIFLDqWR1Y3Rpb24gU3VyIExlcyBBY2Nlc3NvaXJlcw==', 'MTUlIGRlIFLDqWR1Y3Rpb24gU3VyIExlcyBBY2Nlc3NvaXJlcw=='),
(370, '', ''),
(371, '', ''),
(372, '', ''),
(373, 'NSUgZGUgUsOpZHVjdGlvbiBTdXIgTGVzIFBhY2tz', 'NSUgZGUgUsOpZHVjdGlvbiBTdXIgTGVzIFBhY2tz'),
(374, '', ''),
(375, '', ''),
(376, '', ''),
(377, 'Q2FkZWF1IGTigJlhbm5pdmVyc2FpcmU=', 'Q2FkZWF1IGTigJlhbm5pdmVyc2FpcmU='),
(378, '', ''),
(379, '', ''),
(380, '', ''),
(381, 'T3VyIApjb21wYWdueSA=', 'RMOpY291dnJleiAKbm91cw=='),
(382, 'Q29ubmVjdCB3aXRoIAp1cw==', 'U3VpdmV6IHZvdXMgCnN1ciBsZXMgCnLDqXNlYXV4'),
(383, 'Q29udGFjdCBpbmZvcm1hdGlvbg==', 'QmVzb2luIGTigJlhaWRlPw=='),
(384, 'Login', ' Se connecter'),
(385, 'QWxsIHlvdXIgb3JkZXJz', 'VG91dGVzIHZvcyBjb21tYW5kZXMg'),
(386, 'b3JkZXIgcGVuZGluZw==', 'Vm9zIGNvbW1hbmRlcyBlbiBhdHRlbnRlIA=='),
(387, 'b3JkZXIgY29tcGV0ZWQ=', 'Vm9zIGNvbW1hbmRlcyBmaW5hbGlzw6llcyA='),
(388, 'WW91ciBzdGF0dXM=', 'Vm90cmUgc3RhdHV0IAo='),
(389, 'wqBEYXNoYm9hcmQ=', 'TW9uIGJvdWRvaXI='),
(390, 'V2VsY29tZSBiYWNrIHRvIHlvdXIgZGFzaGJvYXJk', 'QmllbnZlbnVlIGRhbnMgdm90cmUgZXNwYWNlIGTDqWRpw6kg'),
(391, 'WW91ciBsb3lhbHR5IHBvaW50cw==', 'Vm9zIHBvaW50cyBkZSBmaWTDqWxpdMOpCg=='),
(392, 'g', ''),
(393, 'UHJpY2U=', 'UHJpeA=='),
(394, 'FilterRmlsdGVy', 'RmlsdHJlcg=='),
(395, 'U29ydCBCeQ==', 'VHJpZXIgcGFy'),
(396, 'RGVmYXVsdCBzb3J0aW5n', 'VHJpIHBhciBkw6lmYXV0'),
(397, 'U29ydCBieSBuZXduZXNz', 'VHJpIHBhciBwcm9kdWl0IHLDqWNlbnQ='),
(398, 'U29ydCBieSBwcmljZSBsb3cgdG8gaGlnaA==', 'VHJpIHBhciBwcml4IGNyb2lzc2FudA=='),
(399, 'U29ydCBieSBwcmluY2UgaGlnaCB0byBsb3c=', 'VHJpIHBhciBwcml4IGTDqWNyb2lzc2FudA=='),
(400, 'UGFpbWVudCAxMDAlIFNlY3VyaXQ=', 'UGx1c2lldXJzIG1vZGUgZGUgcGFpZW1lbnQgZGlzcG9uaWJsZXM='),
(401, '', 'YXZhbnRhZ2VzIA=='),
(402, '', 'ZXQgcmVqb2lnbmV6IG5vdHJlIA=='),
(403, '', 'cHJvZ3JhbW1lIGRlIGZpZMOpbGl0w6k='),
(404, '', 'IGTDqHMgdm90cmUgcHJlbWllciBhY2hhdA=='),
(405, 'WW91ciBQZXJzb25hbCBEZXRhaWxz', 'Vm90cmUgcHJvZmlsIA=='),
(406, 'VHJhY2sgeW91ciBvcmRlciBoZXJl', 'U3VpdmV6IHZvdHJlIGNvbGlzIA=='),
(407, 'Q2hhbmdlIFBhc3N3b3Jk', 'Q2hhbmdlbWVudCBkZSBtb3QgZGUgcGFzc2Ug'),
(408, 'UGFzc3dvcmQ=', 'TW90IGRlIHBhc3NlIA=='),
(409, 'Q29uZmlybSBwYXNzd29yZA==', 'Q29uZmlybWF0aW9uIGR1IG1vdCBkZSBwYXNzZSA='),
(410, 'c2hpcHBpbmcgY29zdA==', 'ZnJhaXMgZGUgbGl2cmFpc29uIA==');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `valid_date` date NOT NULL,
  `p_id` text NOT NULL,
  `minimum_product` int(11) NOT NULL,
  `available_coupon` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `apply` int(11) NOT NULL,
  `peroff` int(11) NOT NULL,
  `cat_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `code`, `start_date`, `valid_date`, `p_id`, `minimum_product`, `available_coupon`, `status`, `apply`, `peroff`, `cat_id`) VALUES
(3, 'JOP', 'EPO0268', '2022-01-05', '2022-02-28', '6,7,8,9,10,11,12,13', 0, 0, 1, 1, 10, '1,2,3,4,5,6,7,8,9');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img`, `p_id`) VALUES
(60, '060420221125451.jpg', 13),
(61, '06042022112928b.jpg', 12),
(62, '06042022113126c.jpg', 11),
(63, '06042022113215d.jpg', 10),
(64, '06042022113311g.jpg', 9),
(65, '12012022090930', 6),
(66, '060420221125451.jpg', 13),
(67, '06042022113126c.jpg', 11),
(68, '060420221125451.jpg', 13),
(69, '06042022112928b.jpg', 12),
(70, '06042022113126', 11),
(71, '06042022113215e.jpg', 10),
(72, '06042022113311d.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_number` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `grandtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` enum('stripe') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'stripe',
  `payer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `payer_id` text COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` text COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `track_id` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `user_id`, `grandtotal`, `currency`, `payment_method`, `payer_email`, `created`, `payer_id`, `transaction_id`, `order_status`, `ship_firstname`, `ship_lastname`, `ship_email`, `ship_phone`, `ship_company`, `ship_address`, `ship_zip`, `ship_country`, `ship_state`, `ship_city`, `track_id`) VALUES
(13, 'MD-1001', 9, '12.24', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-13 09:35:15', 'ch_3KHL1UJ56GOgT4YE1bQAL4Dp', 'txn_3KHL1UJ56GOgT4YE1ZNjqst6', 'Completed', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'MD-1002', 9, '38.76', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-13 15:16:54', 'ch_3KHQM7J56GOgT4YE1m8lRFSb', 'txn_3KHQM7J56GOgT4YE1cmpuHz8', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'MD-1003', 11, '24.99', 'usd', 'stripe', 'hamza@redrhinoz.com', '2022-01-17 23:11:42', 'ch_3KJ4LLJ56GOgT4YE0J7UAL2l', 'txn_3KJ4LLJ56GOgT4YE01aK78Eu', 'Completed', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'MD-1004', 11, '48.96', 'usd', 'stripe', 'hamza@redrhinoz.com', '2022-01-18 12:38:58', '', 'txn_3KJCHNJ56GOgT4YE1AG5Z3UH', 'Shipped', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'MD-1005', 9, '48.96', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-18 12:18:19', '', 'txn_3KJGdiJ56GOgT4YE0ULYITFE', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'MD-1006', 9, '29.48', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-18 12:23:10', '', 'txn_3KJGiPJ56GOgT4YE1qcosekq', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'MD-1007', 9, '49.98', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 06:58:54', '', 'txn_3KKH5FJ56GOgT4YE0G2ZZwKz', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'MD-1008', 9, '29.99', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 07:34:54', '', 'txn_3KKHe5J56GOgT4YE0ga4hSIr', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'MD-1009', 9, '61.2', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 07:36:29', '', 'txn_3KKHfcJ56GOgT4YE1p24mTtN', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'MD-1010', 9, '61.2', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 08:14:53', '', 'txn_3KKIGmJ56GOgT4YE1xv7Sj4s', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'MD-1011', 9, '36.72', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 08:20:37', '', 'txn_3KKIMKJ56GOgT4YE0twxmlpP', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'MD-1012', 9, '29.07', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 08:57:47', '', 'txn_3KKIwIJ56GOgT4YE11sxAZBR', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'MD-1013', 9, '97.31', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 08:59:12', '', 'txn_3KKIxfJ56GOgT4YE1RmbNcf3', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'MD-1014', 9, '88.43', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 09:01:34', '', 'txn_3KKIzxJ56GOgT4YE0SytqDBa', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'MD-1015', 9, '12.24', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-21 09:03:17', '', 'txn_3KKJ1cJ56GOgT4YE1Fin0gM4', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'MD-1016', 12, '24.48', 'usd', 'stripe', 'SAFA@GMAIL.COM', '2022-01-22 05:13:23', '', 'txn_3KKbugJ56GOgT4YE1hnTO7C6', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'MD-1017', 13, '36.72', 'usd', 'stripe', 'safaimaam96@gmail.com', '2022-01-22 06:41:26', '', 'txn_3KKdHtJ56GOgT4YE1EZ3dmdT', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'MD-1018', 13, '49.98', 'usd', 'stripe', 'safaimaam96@gmail.com', '2022-01-22 06:50:13', '', 'txn_3KKdQOJ56GOgT4YE0XyrGXDK', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'MD-1019', 9, '19.99', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-22 10:09:57', '', 'txn_3KKgXgJ56GOgT4YE1MH5AI4s', 'Pending', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'MD-1020', 9, '73.44', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-22 10:23:04', '', 'txn_3KKgkNJ56GOgT4YE18TxRmui', 'Completed', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'MD-1024', 2, '12.24', 'usd', 'stripe', 'customer@gmail.com', '2022-01-25 12:26:12', '', 'txn_3KLjPoJ56GOgT4YE08tgP9Is', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661efa614b2ae4'),
(37, 'MD-1025', 9, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-01-25 08:10:05', '', 'txn_3KLk6KJ56GOgT4YE1r6qp6fL', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661efb05da4a84'),
(38, 'MD-1026', 9, '29.48', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-01-25 09:08:54', '', 'txn_3KLl1GJ56GOgT4YE1FvjCmUs', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661efbe26f3cb0'),
(39, 'MD-1027', 9, '130.15', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-01-25 09:13:59', '', 'txn_3KLl6AJ56GOgT4YE0c3ItrQU', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661efbf57c72ff'),
(40, 'MD-1028', 9, '159.12', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-01-25 09:17:00', '', 'txn_3KLl95J56GOgT4YE0qEgEM5B', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661efc00c0868b'),
(41, 'MD-1029', 9, '42.44', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-01-27 16:22:28', '', 'txn_3KMW3aJ56GOgT4YE1m3ZV1Fd', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661f280740861e'),
(42, 'MD-1030', 14, '12.24', 'usd', 'stripe', 'SAFA22@GMAIL.COM', '2022-01-28 06:41:53', '', 'txn_3KMo9dJ56GOgT4YE11JI8xBM', 'Pending', '', '', '', '', '', '', '', '', '', '', '1661f39031e0712'),
(43, 'MD-1031', 9, '12.24', 'usd', 'stripe', 'techcommando34@gmail.com', '2022-02-10 05:28:04', '', 'txn_3KRVCKJ56GOgT4YE0FrktzDP', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204a264f0325'),
(44, 'MD-1032', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 07:02:18', '', 'txn_3KRWfVJ56GOgT4YE0zZgPRTM', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204b87a4d701'),
(45, 'MD-1033', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 07:29:06', '', 'txn_3KRX5RJ56GOgT4YE1lvuyFAu', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204bec27ae98'),
(46, 'MD-1034', 11, '9.46', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 07:36:42', '', 'txn_3KRXCnJ56GOgT4YE1XYxvoFB', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204c08a3eebb'),
(47, 'MD-1035', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 07:43:14', '', 'txn_3KRXJ7J56GOgT4YE1wiVJg3y', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204c212b858f'),
(48, 'MD-1036', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 08:29:03', '', 'txn_3KRY1TJ56GOgT4YE1wxrZyXw', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204cccfd3353'),
(49, 'MD-1037', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 08:35:16', '', 'txn_3KRY7TJ56GOgT4YE1kt6F7KX', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204ce446fc43'),
(50, 'MD-1038', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 11:52:54', '', 'txn_3KRbCkJ56GOgT4YE0xN1w0az', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204fc96c3c13'),
(51, 'MD-1039', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 12:00:27', '', 'txn_3KRbK2J56GOgT4YE0ge9qu6l', 'Pending', '', '', '', '', '', '', '', '', '', '', '166204fe5bd3a44'),
(52, 'MD-1040', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 13:24:11', '', 'txn_3KRcd4J56GOgT4YE0g545APe', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620511fbcb095'),
(53, 'MD-1041', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-10 13:42:59', '', 'txn_3KRcvGJ56GOgT4YE1ZF4pjNj', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205166365a04'),
(54, 'MD-1042', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:27:54', '', 'txn_3KRrfiJ56GOgT4YE10r35hjA', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f3dad5791'),
(55, 'MD-1043', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:37:15', '', 'txn_3KRrokJ56GOgT4YE10YRP1ru', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f60b70a0d'),
(56, 'MD-1044', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:39:18', '', 'txn_3KRrqjJ56GOgT4YE15pAbspZ', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f686d7a91'),
(57, 'MD-1045', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:41:03', '', 'txn_3KRrsQJ56GOgT4YE0JKcdcs7', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f6ef91ede'),
(58, 'MD-1046', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:45:00', '', 'txn_3KRrwGJ56GOgT4YE0CKJyz1z', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f7dce25b4'),
(59, 'MD-1047', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:46:41', '', 'txn_3KRrxsJ56GOgT4YE1eBTY6jM', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f84121a03'),
(60, 'MD-1048', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:50:31', '', 'txn_3KRs1aJ56GOgT4YE0gTveqpa', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205f92725590'),
(61, 'MD-1049', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 05:57:27', '', 'txn_3KRs8IJ56GOgT4YE0fP4MHHv', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205fac740f69'),
(62, 'MD-1050', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 06:14:38', '', 'txn_3KRsOvJ56GOgT4YE0ljP09z9', 'Pending', '', '', '', '', '', '', '', '', '', '', '166205fece2e802'),
(63, 'MD-1051', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 06:28:49', '', 'txn_3KRsceJ56GOgT4YE0s9cwemp', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620602219ce82'),
(64, 'MD-1052', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-11 07:06:30', '', 'txn_3KRtD7J56GOgT4YE1XuTpcMX', 'Pending', '', '', '', '', '', '', '', '', '', '', '1662060af60d175'),
(65, 'MD-1053', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-14 13:35:48', '', 'txn_3KT4iWJ56GOgT4YE0yc2jHX0', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620a5ab4ea02d'),
(66, 'MD-1054', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-14 13:38:15', '', 'txn_3KT4ksJ56GOgT4YE1eZPATPp', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620a5b47384be'),
(67, 'MD-1055', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-14 13:42:24', '', 'txn_3KT4otJ56GOgT4YE0LKC9MV0', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620a5c4056365'),
(68, 'MD-1056', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-14 13:45:22', '', 'txn_3KT4rlJ56GOgT4YE0CGszu4a', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620a5cf2043ea'),
(69, 'MD-1057', 11, '12.24', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-14 13:49:46', '', 'txn_3KT4w1J56GOgT4YE1Z5lBb5o', 'Pending', '', '', '', '', '', '', '', '', '', '', '16620a5dfa9f271'),
(70, 'MD-1058', 11, '9.46', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-02-21 08:05:16', '', 'txn_3KVWtTJ56GOgT4YE0EBPYWkO', 'Pending', '', '', '', '', '', '', '', '', '', '', '16621347bc6ecd5'),
(71, 'MD-1059', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-03-08 11:02:00', '', 'txn_3Kb0njJ56GOgT4YE1O1D3NYi', 'Pending', '', '', '', '', '', '', '', '', '', '', '16622737a85e4a0'),
(72, 'MD-1060', 1, '5', 'usd', 'stripe', 'admin@gmail.com', '2022-03-08 11:11:46', '', 'txn_3Kb0xCJ56GOgT4YE1REokGG0', 'Pending', '', '', '', '', '', '', '', '', '', '', '16622739f2e46f1'),
(73, 'MD-1061', 1, '5', 'usd', 'stripe', 'admin@gmail.com', '2022-03-08 11:14:07', '', 'txn_3Kb0zSJ56GOgT4YE1ZXq6j0Y', 'Pending', '', '', '', '', '', '', '', '', '', '', '1662273a7f0f09b'),
(74, 'MD-1062', 11, '5', 'usd', 'stripe', 'zaidiftikhar27@gmail.com', '2022-03-08 11:15:12', '', 'txn_3Kb10VJ56GOgT4YE0appGbq4', 'Pending', '', '', '', '', '', '', '', '', '', '', '1662273ac033725'),
(75, 'MD-1063', 1, '5', 'usd', 'stripe', 'admin@gmail.com', '2022-03-08 19:05:15', '', 'txn_3Kb3f4J56GOgT4YE0ZQYQYPS', 'Pending', '', '', '', '', '', '', '', '', '', '', '166227629b4c74d');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_email`
--

CREATE TABLE `invoice_email` (
  `id` int(11) NOT NULL,
  `header_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_heading` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliver_adr_head` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number_head` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_detail_head` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_email`
--

INSERT INTO `invoice_email` (`id`, `header_text`, `heading`, `description`, `shipping_heading`, `deliver_adr_head`, `order_number_head`, `order_detail_head`, `footer_text`) VALUES
(1, 'SWYgeW91IGNhbnQgdmlldyB0aGlzIGludm9pY2UgcHJvcGVybHkgcGxlYXNlIHVzZSB3ZWIgdmlldy4=', 'Commande confirm&eacute;e', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD48c3BhbiBzdHlsZT0ibGluZS1oZWlnaHQ6IGluaGVyaXQ7IGZvbnQtZmFtaWx5OiBMYXRvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE4cHg7IGJhY2tncm91bmQtY29sb3I6ICNmNWY1ZjU7Ij5NZXJjaSBwb3VyIHZvdHJlIGNvbW1hbmRlICEgVm91cyB0cm91dmVyZXogY2ktZGVzc291cyB0b3VzIGxlcyBkJmVhY3V0ZTt0YWlscy48YnIgc3R5bGU9ImxpbmUtaGVpZ2h0OiBpbmhlcml0OyIgLz5TaSB2b3VzIGF2ZXogYmVzb2luIGQmcnNxdW87YWlkZSwgbWVyY2kgZCZyc3F1bztlbnZveWVyIHVuIG1haWwgJmFncmF2ZTsmbmJzcDs8YSBzdHlsZT0ibGluZS1oZWlnaHQ6IGluaGVyaXQ7IGNvbG9yOiAjMTE1NWNjOyIgaHJlZj0ibWFpbHRvOnNlcnZpY2VjbGllbnRAbmFwcHlsaWZlLmZyIiB0YXJnZXQ9Il9ibGFuayIgcmVsPSJub29wZW5lciI+c2VydmljZWNsaWVudEBuYXBweWxpZmUuZnI8L2E+PGJyIHN0eWxlPSJsaW5lLWhlaWdodDogaW5oZXJpdDsiIC8+PC9zcGFuPjwvcD4NCjxwPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDogaW5oZXJpdDsgZm9udC1mYW1pbHk6IExhdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMThweDsgYmFja2dyb3VuZC1jb2xvcjogI2Y1ZjVmNTsiPkEgYmllbnQmb2NpcmM7dDxiciBzdHlsZT0ibGluZS1oZWlnaHQ6IGluaGVyaXQ7IiAvPk5hcHB5bGlmZTwvc3Bhbj48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 'Mode d&rsquo;exp&eacute;dition', 'Adresse de livraison', 'Num&eacute;ro de commande', 'D&eacute;tail de la commande', 'RXhjZXB0ZXVyIHNpbnQgb2NjYWVjYXQgY3VwaWRhdGF0IG5vbiBwcm9pZGVudCwgc3VudCBpbiBjdWxwYSBxdWkgb2ZmaWNpYSBkZXNlcnVudCBtb2xsaXQgYW5pbSBpZCBlc3QgbGFib3J1bS4gU2VkIHV0IHBlcnNwaWNpYXRpcyB1bmRlIG9tbmlzIGlzdGUgbmF0dXMgZXJyb3Igc2l0IHZvbHVwdGF0ZW0gYWNjdXNhbnRpdW0gZG9sb3JlbXF1ZSBsYXVkYW50aXVtLCB0b3RhbSByZW0gYXBlcmlhbSwgZWFxdWUgaXBzYSBxdWFlIGFiIGlsbG8gaW52ZW50b3JlIHZlcml0YXRpcy4=');

-- --------------------------------------------------------

--
-- Table structure for table `length_variation`
--

CREATE TABLE `length_variation` (
  `id` int(11) NOT NULL,
  `variation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `length_variation`
--

INSERT INTO `length_variation` (`id`, `variation`) VALUES
(1, '1.5'),
(2, '5');

-- --------------------------------------------------------

--
-- Table structure for table `member_points`
--

CREATE TABLE `member_points` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `elf_1` varchar(50) NOT NULL,
  `elf_2` varchar(50) NOT NULL,
  `nymph_1` varchar(50) NOT NULL,
  `nymph_2` varchar(50) NOT NULL,
  `goddess` varchar(50) NOT NULL,
  `pur1_a` varchar(50) NOT NULL,
  `pur1_b` varchar(50) NOT NULL,
  `pur2_a` varchar(50) NOT NULL,
  `pur2_b` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_points`
--

INSERT INTO `member_points` (`id`, `status`, `elf_1`, `elf_2`, `nymph_1`, `nymph_2`, `goddess`, `pur1_a`, `pur1_b`, `pur2_a`, `pur2_b`) VALUES
(1, '3', '0', '150', '150', '499', '500', '20', '80', '80', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'ibrahimnawab303@gmail.com'),
(4, 'techcommando34@gmail.com'),
(6, 'ehaustan@hotmail.fr'),
(7, 'bestxmasoffers@gmail.com'),
(8, 'admdssn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `options` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `options`, `question_id`, `answers`) VALUES
(1, 'Une Femme ', 1, ''),
(2, 'Un Homme ', 1, ''),
(3, '', 1, ''),
(4, '', 1, ''),
(5, '', 1, ''),
(6, '', 1, ''),
(7, 'Entre 10 et 18 ans ', 2, ''),
(8, '19 et 25 ans ', 2, ''),
(9, '26 et 30 ans ', 2, ''),
(10, '31 et 40 ans ', 2, ''),
(11, '41 et 60 ans ', 2, ''),
(12, ' 61 ans et plus ', 2, ''),
(13, 'Fin si inférieur à la taille d’un fil de couture', 3, ''),
(14, 'Moyen si égal à la taille d’un fil de couture  ', 3, ''),
(15, 'Epais si supérieur à la taille d’un fil de couture? ', 3, ''),
(16, '', 3, ''),
(17, '', 3, ''),
(18, '', 3, ''),
(19, 'Fin : Vite forgé d’eau mais sèche rapidement, forte brillance quand le cheveux est tiré uniquement', 4, ''),
(20, 'Raide : L’eau ne pénètre pas facilement , éclat scintillant', 4, ''),
(21, 'Cotonneux : se gorge d’eau au fur et à mesure , brillant quand le cheveux est tiré ', 4, ''),
(22, 'Spongieux ; Absorbe énormément l’eau, forte brillance  ', 4, ''),
(23, 'Soyeux : se gorge d’eau facilement, très forte brillance', 4, ''),
(24, '', 4, ''),
(25, 'Court jusqu’à 10 cm ', 5, ''),
(26, 'Mi-long de 11 à 31 cm ', 5, ''),
(27, 'Long à partir de 32 cm', 5, ''),
(28, '', 5, ''),
(29, '', 5, ''),
(30, '', 5, ''),
(31, 'Crépus', 6, ''),
(32, 'Frisés', 6, ''),
(33, 'Bouclés', 6, ''),
(34, 'Ondulés', 6, ''),
(35, ' Lisses', 6, ''),
(36, '', 6, ''),
(37, 'Les cheveux défrisés ', 7, ''),
(38, 'Locksés ', 7, ''),
(39, 'cheveux blancs ', 7, ''),
(40, 'Chute de cheveux ', 7, ''),
(41, 'Cheveux colorés', 7, ''),
(42, '', 7, ''),
(43, 'Tous les jours ', 8, ' C’est top!, soigner ses cheveux à l’aide d’une routine quotidienne est primordial'),
(44, '3 jours par semaine ', 8, 'Si vous souhaitez correctement soin correctement de vos cheveux, nous vous recommandons vivement d’en prendre soin tous les jours'),
(45, ' 2 jours par semaine ', 8, 'Si vous souhaitez correctement soin correctement de vos cheveux, nous vous recommandons vivement d’en prendre soin tous les jours'),
(46, '1 jour par semaine', 8, 'Si vous souhaitez correctement soin correctement de vos cheveux, nous vous recommandons vivement d’en prendre soin tous les jours'),
(47, '', 8, ''),
(48, '', 8, ''),
(49, '1 bouteille 1,5l ', 9, ' Vous buvez suffisamment d’eau pour hydrater vos cheveux de l’intérieur'),
(50, 'Entre 2 à 3 verres d’eau ', 9, 'Buvez d’avantage d’eau pour l’hydratation intérieure'),
(51, 'Moins de 2 verres d’eau ', 9, 'Buvez d’avantage d’eau pour l’hydratation intérieure'),
(52, '', 9, ''),
(53, '', 9, ''),
(54, '', 9, ''),
(55, 'Equilibré Omnivore (de tout)  ', 10, ' Nous vous recommandons de manger équilibré avec les vitamines et les acides gras nécessaires. Ne négligez pas les protéines pour favoriser la création de la Kératine.'),
(56, 'Vegan ( pas de produit animal) ', 10, ' Nous vous recommandons de manger équilibré avec les vitamines et les acides gras nécessaires. Ne négligez pas les protéines pour favoriser la création de la Kératine.'),
(57, 'pescétariens (produits de la mer)', 10, ' Nous vous recommandons de manger équilibré avec les vitamines et les acides gras nécessaires. Ne négligez pas les protéines pour favoriser la création de la Kératine.'),
(58, 'Végétariens', 10, ' Nous vous recommandons de manger équilibré avec les vitamines et les acides gras nécessaires. Ne négligez pas les protéines pour favoriser la création de la Kératine.'),
(59, '', 10, ''),
(60, '', 10, ''),
(61, 'La croissance ', 11, 'Rassurez vous, nous sommes là pour vous aider et vous accompagner pour atteindre votre Hairgoal !'),
(62, 'Disposer d’une routine capillaire adaptée ', 11, 'Rassurez vous, nous sommes là pour vous aider et vous accompagner pour atteindre votre Hairgoal !'),
(63, 'Dire adieu au défrisage ', 11, 'Rassurez vous, nous sommes là pour vous aider et vous accompagner pour atteindre votre Hairgoal !'),
(64, 'Avoir de beaux cheveux', 11, 'Rassurez vous, nous sommes là pour vous aider et vous accompagner pour atteindre votre Hairgoal !'),
(65, '', 11, ''),
(66, '', 11, ''),
(67, 'Moins de 30 euros ', 12, ''),
(68, 'Entre 50 et 80 euros ', 12, ''),
(69, '80 euros et plus', 12, ''),
(70, '', 12, ''),
(71, '', 12, ''),
(72, '', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `our_clients`
--

CREATE TABLE `our_clients` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_clients`
--

INSERT INTO `our_clients` (`id`, `image`) VALUES
(2, '1.webp'),
(3, '2.webp'),
(4, '3.webp'),
(5, '4.webp'),
(6, '5.webp'),
(7, '6.webp'),
(8, 'sin.webp');

-- --------------------------------------------------------

--
-- Table structure for table `page_image`
--

CREATE TABLE `page_image` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_image`
--

INSERT INTO `page_image` (`id`, `image`) VALUES
(1, '07012022050141iStock-1164266831-min.jpg'),
(2, 'about-us-img1.webp'),
(3, '28122021094648about-us-icon1.webp'),
(4, '28122021094656about-us-icon2.webp'),
(5, '28122021094626about-us-icon3.webp'),
(6, '28122021094632about-us-icon4.webp'),
(7, '28122021094955about-us-img2.webp'),
(8, '060120221427501_4.webp'),
(9, 'banner-3.jpg'),
(10, 'banner-2.jpg'),
(11, 'banner-4.jpg'),
(12, 'banner-5.jpg'),
(13, 'faqs.jpg'),
(14, 'support.jpg'),
(15, 'terms_and_services.jpg'),
(16, 'Privacy-Policy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `transaction_id` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `paidby` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `img` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_date` date DEFAULT NULL,
  `featured` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `pro_use` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `link`, `img`, `short_description`, `long_description`, `category`, `created_date`, `featured`, `ingredients`, `pro_use`) VALUES
(6, 'Huile de ricin Yari', 'huile-de-ricin-yari', '1101202209402601_CastorOil_1800x1800.jpg', 'Huile de ricin\r\n', 'Huile de ricin\r\n', '8', '2022-01-11', 0, 'Ricinus communis', 'A appliquer sur les racines quotidiennement ou en bain d\'huile '),
(7, 'Shea Moisture raw shea butter deep treatment masque', 'shea-moisture-raw-shea-butter-deep-treatment-masque', '1101202210082902_Deepmasque002_1800x1800.jpg', 'Ce s&eacute;rum prot&egrave;ge les cheveux contre les dommages caus&eacute;s par la chaleur des outils thermiques. Il procure un &eacute;clat &agrave; vos cheveux et les rend plus soyeux.\r\n', 'Ce s&eacute;rum prot&egrave;ge les cheveux contre les dommages caus&eacute;s par la chaleur des outils thermiques. Il procure un &eacute;clat &agrave; vos cheveux et les rend plus soyeux.\r\n', '6', '2022-01-11', 0, 'Deionized Water, Decyl Glucoside, African Butyrospermum Parkii, Aloe Vera Leaf Juice, Argan Oil, Panthenol, Rosemary Extract, Sea Kelp Extract, Vitamin E, Guar Gum, Lonicera Caprofolium Flower Lonicera Japonica Flower Extract, Avocado Oil.', 'A appliquer apr&egrave;s le shampoing et laisser poser 30 min minimum avant de rincer'),
(8, 'Cantu Shea butter deep treatment masque', 'cantu-shea-butter-deep-treatment-masque', '1101202210075403_deeptreatmentmasque2_1800x1800.jpg', '&quot;Le masque de soin intense (Deep Treatment Masque) p&eacute;n&egrave;tre dans la fibre capillaire pour l\'hydrater en profondeur. Il r&eacute;pare les cheveux ab&icirc;mer, secs et cassants. Les cheveux sont assouplis et plus facile &agrave; coiffer.', '&quot;Le masque de soin intense (Deep Treatment Masque) p&eacute;n&egrave;tre dans la fibre capillaire pour l\'hydrater en profondeur. Il r&eacute;pare les cheveux ab&icirc;mer, secs et cassants. Les cheveux sont assouplis et plus facile &agrave; coiffer.\r\nEnrichi au beurre de karit&eacute;, sa formule est sans produits agressifs pour les cheveux.\r\nSans huile min&eacute;rale, Sulfate, Paraben, Silicone, Phtalates, Gluten, Paraffine ou Propyl&egrave;ne\r\nRestaure et renforme les cheveux secs et ab&icirc;m&eacute;s\r\nId&eacute;al pour les cheveux d&eacute;vitalis&eacute;s ou ab&icirc;m&eacute;s\r\nAugmente l\'&eacute;lasticit&eacute; des cheveux pour limiter les casses&quot;\r\n', '6', '2022-01-11', 0, 'Water, Canola Oil, Cetearyl Alcohol/Ceteareth-20, Glycerin, Fragrance, Beeswax, Cetyl Alcohol, Butyrospermum Parkii (Shea) Butter, Glycol Stearate, Polyquaternium-10, Cocos Nucifera (Coconut) Oil, Persea Gratissma (Avocado) Oil, Prunus Amygdalus Dulcis (Sweet Almond) Oil, Simmondsia Chinensis (Jojoba) Oil, Olea Europaea (Olive) Fruit Oil, Mangifera Indica (Mango) Seed Butter, Melia Azadirachta (Neem) Seed Oil, Daucus Carota Sativa (Carrot) Seed Oil, Macadamia Ternifolia (Macadamia) Seed Oil, Glycine Soja (Soybean) Oil, Argania Spinosa (Argan) Kernel Oil, Aloe Barbadensis (Aloe Vera) Leaf Juice, Lonicera Japonica (Honeysuckle) Flower Extract, Laminara Cloustoni (Sea Kelp) Extract, Salvia Officinalis (Sage) Leaf Extract, Vitis Vinifera (Grape) Seed Extract, Melia Azadirachta (Neem) Seed Oil, Silk Amino Acids, Phenoxyethanol, Ethylhexylglycerin.', 's'),
(9, 'Product Title Here', 'product-title-here', '06042022113311f.jpg', 'Ce s&eacute;rum prot&egrave;ge les cheveux contre les dommages caus&eacute;s par la chaleur des outils thermiques. Il procure un &eacute;clat &agrave; vos cheveux et les rend plus soyeux.\r\n', 'Ce s&eacute;rum prot&egrave;ge les cheveux contre les dommages caus&eacute;s par la chaleur des outils thermiques. Il procure un &eacute;clat &agrave; vos cheveux et les rend plus soyeux.\r\n', '9', '2022-01-11', 0, 'Color', 'Appliquer 5 &agrave; 10 gouttes sur les longueurs avant tout traitement des cheveux avec un s&egrave;che cheveu ou plaques'),
(10, 'Product Title Here', 'product-title-here', '06042022113215d.jpg', '&quot;Le shampooing Beurre de Karit&eacute; &quot;&quot;Retention&quot;&quot; de la marque Shea Moisture d&eacute;toxifie, hydrate, r&eacute;pare les cheveux. \r\nEnrichi en ingr&eacute;dients 100% naturels et organiques Convient aux cheveux naturels, d&eacute;fris&eacute;s ou color&eacute;s.\r\n', '&quot;Le shampooing Beurre de Karit&eacute; &quot;&quot;Retention&quot;&quot; de la marque Shea Moisture d&eacute;toxifie, hydrate, r&eacute;pare les cheveux. \r\nEnrichi en ingr&eacute;dients 100% naturels et organiques\r\nConvient aux cheveux naturels, d&eacute;fris&eacute;s ou color&eacute;s.\r\nSans silicone, sulfate, parab&egrave;ne, glyc&eacute;rine, sans produits de synth&egrave;se et sans huiles min&eacute;rales.&quot;\r\n', '5', '2022-01-11', 0, 'Deionized Water, Decyl Glucoside, African Butyrospermum Parkii, Aloe Vera Leaf Juice, Argan Oil, Panthenol, Rosemary Extract, Sea Kelp Extract, Vitamin E, Guar Gum, Lonicera Caprofolium Flower Lonicera Japonica Flower Extract, Avocado Oil.', 'Appliquer sur cheveux mouill&eacute;s, bien masser le cuir chevelu et faire glisser sur les longueurs. Faire mousser puis rincer et r&eacute;p&eacute;ter si n&eacute;cessaire.'),
(11, 'Product Title Here', 'product-title-here', '06042022113126c.jpg', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae\r\nDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae\r\nDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae\r\nDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae\r\nDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae', '9', '2022-01-11', 0, 'Color', 'Use for'),
(12, 'Product Title Here', 'product-title-here', '06042022112928b.jpg', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae\r\nDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitaeDesigned for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae', '9', '2022-01-11', 0, 'color', 'Use for'),
(13, 'Product Title Here', 'product-title-here', '060420221125451.jpg', 'Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations id lacinia massa imperdiet vitae', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Vir ginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable', '9', '2022-01-11', 0, 'Color', 'This is use for');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `tid` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `answer`, `tid`, `std_id`, `video`) VALUES
(1, 'Vous êtes :', '', 0, 0, ''),
(2, 'Quel âge avez-vous ? ', '', 0, 0, ''),
(3, 'Quelle est l’épaisseur de vos cheveux : ', '', 0, 0, ''),
(4, 'Quelle est la texture de vos cheveux »', '', 0, 0, ''),
(5, 'Quelle est votre longueur de cheveux » ', '', 0, 0, ''),
(6, 'Quelle est la nature de vos cheveux » :', '', 0, 0, ''),
(7, 'Quelle est la particularité de vos cheveux » : ', '', 0, 0, ''),
(8, 'Quel temps souhaitez-vous allouer à l’entretien de vos cheveux par jour sur une semaine type ? »', '', 0, 0, ''),
(9, 'Quelle quantité d’eau buvez-vous chaque jour ? ', '', 0, 0, ''),
(10, 'Comment qualifiez-vous votre alimentation ?', '', 0, 0, ''),
(11, 'Quel est votre Hair Goal numéro 1?', '', 0, 0, ''),
(12, 'Quel budget souhaitez-vous allouer pour atteindre ce goal par mois?', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `title`, `page_link`, `keywords`, `description`) VALUES
(1, 'Home', 'index', 'U3RyZWFta2luZ3MsU3RyZWFta2luZ3MgaG9tZQ==', 'U3RyZWFta2luZ3M='),
(2, 'Cart', 'cart', '', ''),
(3, 'About', 'about-us', '', ''),
(4, 'Blogs', 'blog', '', ''),
(5, 'Contact', 'contact-us', '', ''),
(6, 'Products', 'shop', '', ''),
(7, 'Checkout', 'checkout', '', ''),
(8, 'Payment Detail', 'return', '', ''),
(9, 'Login', 'login', '', ''),
(10, 'Register', 'register', '', ''),
(11, 'Forgot Password', 'forgot-password', '', ''),
(12, 'FAQ', 'faq', 'bmFwcHlsaWZlIGZhcXMsZmFxcw==', 'bmFwcHlsaWZlIA=='),
(13, 'Product Detail', 'single-product', '', ''),
(14, 'Blog Details', 'blog-details', '', ''),
(15, 'Account', 'account', '', ''),
(16, 'Quiz', 'quiz', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `fb_link` text NOT NULL,
  `insta_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `map_link` text NOT NULL,
  `office_address` text NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `office_phone` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_favicon`, `site_logo`, `fb_link`, `insta_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `map_link`, `office_address`, `site_email`, `gst`, `office_phone`, `description`) VALUES
(1, 'Manchester United', 'icon.png', 'logo.png', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', '', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361481.320531674!2d-113.7597887183537!3d36.24060500258753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1641387827526!5m2!1sen!2s', 'USA', 'info@manchesterunited.com', '2', '12', 'TWFuY2hlc3RlciBVbml0ZWQgU2hvcnQgRGVzY3JpcHRpb24=');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addres`
--

CREATE TABLE `shipping_addres` (
  `id` int(11) NOT NULL,
  `shipping_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_addres`
--

INSERT INTO `shipping_addres` (`id`, `shipping_price`) VALUES
(1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `size_variation`
--

CREATE TABLE `size_variation` (
  `id` int(11) NOT NULL,
  `variation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size_variation`
--

INSERT INTO `size_variation` (`id`, `variation`) VALUES
(1, 'L'),
(2, 'M'),
(3, 'S'),
(4, 'Xl');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `sub_title`, `title`, `image`) VALUES
(1, 'naturally cleanse &amp; moisturise', 'Makeup &amp; Beauty', '24012022070010slider3.png'),
(2, 'naturally cleanse &amp; moisturise', 'Makeup &amp; Beauty', '24012022065916slider1.jpg'),
(3, 'naturally cleanse &amp; moisturise', 'Makeup &amp; Beauty', '24012022065846slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `variationid` int(11) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `variationid`, `stock`, `productid`) VALUES
(1, 1, 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `id` int(11) NOT NULL,
  `answers` varchar(200) NOT NULL,
  `q_id` int(11) NOT NULL,
  `ip` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_answer`
--

INSERT INTO `student_answer` (`id`, `answers`, `q_id`, `ip`) VALUES
(123, 'Une femme ', 1, '82.124.89.12'),
(124, 'Une Femme ', 1, '182.189.83.181'),
(125, 'Une Femme ', 1, '39.50.215.143');

-- --------------------------------------------------------

--
-- Table structure for table `team_sheet`
--

CREATE TABLE `team_sheet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `birth_place` varchar(150) NOT NULL,
  `cityzenship` varchar(150) NOT NULL,
  `matches` varchar(100) NOT NULL,
  `goals` varchar(100) NOT NULL,
  `present_club` varchar(100) NOT NULL,
  `overview` text NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_sheet`
--

INSERT INTO `team_sheet` (`id`, `name`, `position`, `team`, `born`, `weight`, `height`, `birth_place`, `cityzenship`, `matches`, `goals`, `present_club`, `overview`, `image`, `link`) VALUES
(1, 'Lionel Messi', 'striker', 'Argentine, Spanish', '2022-04-19', '70', '5.5', 'Rosario, Argentina', 'Argentine, Spanish', '100', '200', 'Argentine footballer', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+PHN0cm9uZz5MaW9uZWwgQW5kciZlYWN1dGU7cyBNZXNzaTwvc3Ryb25nPjxzdXAgaWQ9ImNpdGVfcmVmLTgiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaW9uZWxfTWVzc2kjY2l0ZV9ub3RlLTgiPltub3RlIDFdPC9hPjwvc3VwPiZuYnNwOyg8c21hbGwgc3R5bGU9ImZvbnQtc2l6ZTogMTEuOXB4OyI+U3BhbmlzaCBwcm9udW5jaWF0aW9uOiZuYnNwOzwvc21hbGw+PHNwYW4gY2xhc3M9IklQQSIgdGl0bGU9IlJlcHJlc2VudGF0aW9uIGluIHRoZSBJbnRlcm5hdGlvbmFsIFBob25ldGljIEFscGhhYmV0IChJUEEpIj48YSBzdHlsZT0iY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lICFpbXBvcnRhbnQ7IiB0aXRsZT0iSGVscDpJUEEvU3BhbmlzaCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSGVscDpJUEEvU3BhbmlzaCI+W2xqb8uIbmVsIGFuy4hkyb5lcyDLiG1lc2ldPC9hPjwvc3Bhbj4mbmJzcDs8c3BhbiBjbGFzcz0ibm93cmFwIiBzdHlsZT0id2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS45cHg7Ij4oPHNwYW4gY2xhc3M9InVuaWNvZGUgaGF1ZGlvIj48c3BhbiBjbGFzcz0iZm4iPjxzcGFuIHN0eWxlPSJtYXJnaW4tcmlnaHQ6IDAuMjVlbTsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQWJvdXQgdGhpcyBzb3VuZCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRmlsZTpMaW9uZWxfQW5kciVDMyVBOXNfTWVzc2lfLV9OYW1lLm9nZyI+PGltZyBzdHlsZT0iYm9yZGVyOiAwcHg7IHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7IG1hcmdpbjogMHB4OyIgc3JjPSJodHRwczovL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzExcHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyIgc3Jjc2V0PSIvL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzE3cHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyAxLjV4LCAvL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzIycHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyAyeCIgYWx0PSJhdWRpbyBzcGVha2VyIGljb24iIHdpZHRoPSIxMSIgaGVpZ2h0PSIxMSIgZGF0YS1maWxlLXdpZHRoPSIyMCIgZGF0YS1maWxlLWhlaWdodD0iMjAiIC8+PC9hPjwvc3Bhbj48YSBjbGFzcz0iaW50ZXJuYWwiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlvbmVsIEFuZHImZWFjdXRlO3MgTWVzc2kgLSBOYW1lLm9nZyIgaHJlZj0iaHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8wLzA5L0xpb25lbF9BbmRyJUMzJUE5c19NZXNzaV8tX05hbWUub2dnIj5saXN0ZW48L2E+PC9zcGFuPjwvc3Bhbj4pPC9zcGFuPjsgYm9ybiAyNCBKdW5lIDE5ODcpLCBhbHNvIGtub3duIGFzJm5ic3A7PHN0cm9uZz5MZW8gTWVzc2k8L3N0cm9uZz4sIGlzIGFuIEFyZ2VudGluZSBwcm9mZXNzaW9uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkFzc29jaWF0aW9uIGZvb3RiYWxsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Bc3NvY2lhdGlvbl9mb290YmFsbCI+Zm9vdGJhbGxlcjwvYT4mbmJzcDt3aG8gcGxheXMgYXMgYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRm9yd2FyZCAoYXNzb2NpYXRpb24gZm9vdGJhbGwpIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Gb3J3YXJkXyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPmZvcndhcmQ8L2E+Jm5ic3A7Zm9yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaWd1ZSAxIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaWd1ZV8xIj5MaWd1ZSAxPC9hPiZuYnNwO2NsdWImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlBhcmlzIFNhaW50LUdlcm1haW4gRi5DLiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUGFyaXNfU2FpbnQtR2VybWFpbl9GLkMuIj5QYXJpcyBTYWludC1HZXJtYWluPC9hPiZuYnNwO2FuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQ2FwdGFpbiAoYXNzb2NpYXRpb24gZm9vdGJhbGwpIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9DYXB0YWluXyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPmNhcHRhaW5zPC9hPiZuYnNwO3RoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQXJnZW50aW5hIG5hdGlvbmFsIGZvb3RiYWxsIHRlYW0iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0FyZ2VudGluYV9uYXRpb25hbF9mb290YmFsbF90ZWFtIj5BcmdlbnRpbmEgbmF0aW9uYWwgdGVhbTwvYT4uIE9mdGVuIGNvbnNpZGVyZWQgdGhlIGJlc3QgcGxheWVyIGluIHRoZSB3b3JsZCBhbmQgd2lkZWx5IHJlZ2FyZGVkIGFzIG9uZSBvZiB0aGUgZ3JlYXRlc3QgcGxheWVycyBvZiBhbGwgdGltZSwgTWVzc2kgaGFzIHdvbiBhIHJlY29yZCBzZXZlbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQmFsbG9uIGQnT3IiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JhbGxvbl9kJTI3T3IiPkJhbGxvbiBkJ09yPC9hPiZuYnNwO2F3YXJkcyw8c3VwIGlkPSJjaXRlX3JlZi0xMSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpb25lbF9NZXNzaSNjaXRlX25vdGUtMTEiPltub3RlIDJdPC9hPjwvc3VwPiZuYnNwO2EgcmVjb3JkIHNpeCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRXVyb3BlYW4gR29sZGVuIFNob2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V1cm9wZWFuX0dvbGRlbl9TaG9lIj5FdXJvcGVhbiBHb2xkZW4gU2hvZXM8L2E+LCBhbmQgaW4gMjAyMCB3YXMgbmFtZWQgdG8gdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJCYWxsb24gZCdPciBEcmVhbSBUZWFtIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CYWxsb25fZCUyN09yX0RyZWFtX1RlYW0jRmlyc3RfVGVhbSI+QmFsbG9uIGQnT3IgRHJlYW0gVGVhbTwvYT4uIFVudGlsIGxlYXZpbmcgdGhlIGNsdWIgaW4gMjAyMSwgaGUgaGFkIHNwZW50IGhpcyBlbnRpcmUgcHJvZmVzc2lvbmFsIGNhcmVlciB3aXRoJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJGQyBCYXJjZWxvbmEiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ZDX0JhcmNlbG9uYSI+QmFyY2Vsb25hPC9hPiwgd2hlcmUgaGUgd29uIGEmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgRkMgQmFyY2Vsb25hIHJlY29yZHMgYW5kIHN0YXRpc3RpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfRkNfQmFyY2Vsb25hX3JlY29yZHNfYW5kX3N0YXRpc3RpY3MiPmNsdWItcmVjb3JkPC9hPiZuYnNwOzM1IHRyb3BoaWVzLCBpbmNsdWRpbmcgdGVuJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMYSBMaWdhIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MYV9MaWdhIj5MYSBMaWdhPC9hPiZuYnNwO3RpdGxlcywgc2V2ZW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNvcGEgZGVsIFJleSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29wYV9kZWxfUmV5Ij5Db3BhIGRlbCBSZXk8L2E+Jm5ic3A7dGl0bGVzIGFuZCBmb3VyJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJVRUZBIENoYW1waW9ucyBMZWFndWUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1VFRkFfQ2hhbXBpb25zX0xlYWd1ZSI+VUVGQSBDaGFtcGlvbnMgTGVhZ3VlczwvYT4uIEEgcHJvbGlmaWMgZ29hbHNjb3JlciBhbmQgY3JlYXRpdmUgcGxheW1ha2VyLCBNZXNzaSBob2xkcyB0aGUgcmVjb3JkcyBmb3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgTGEgTGlnYSB0b3Agc2NvcmVycyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9MYV9MaWdhX3RvcF9zY29yZXJzI0FsbC10aW1lX3RvcF9zY29yZXJzIj5tb3N0IGdvYWxzIGluIExhIExpZ2E8L2E+Jm5ic3A7KDQ3NCksJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaXN0IG9mIExhIExpZ2EgdG9wIHNjb3JlcnMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfTGFfTGlnYV90b3Bfc2NvcmVycyNUb3Bfc2NvcmVyc19ieV9zZWFzb24iPmEgTGEgTGlnYTwvYT4mbmJzcDthbmQgRXVyb3BlYW4gbGVhZ3VlIHNlYXNvbiAoNTApLCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlzdCBvZiBMYSBMaWdhIGhhdC10cmlja3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfTGFfTGlnYV9oYXQtdHJpY2tzIj5tb3N0IGhhdC10cmlja3MgaW4gTGEgTGlnYTwvYT4mbmJzcDsoMzYpIGFuZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIGhhdC10cmlja3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfVUVGQV9DaGFtcGlvbnNfTGVhZ3VlX2hhdC10cmlja3MiPlVFRkEgQ2hhbXBpb25zIExlYWd1ZTwvYT4mbmJzcDsoOCksIGFuZCBtb3N0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJBc3Npc3QgKGFzc29jaWF0aW9uIGZvb3RiYWxsKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXNzaXN0Xyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPmFzc2lzdHM8L2E+Jm5ic3A7aW4gTGEgTGlnYSAoMTkyKSwgYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlzdCBvZiBMYSBMaWdhIHRvcCBzY29yZXJzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX0xhX0xpZ2FfdG9wX3Njb3JlcnMjVG9wX3Njb3JlcnNfYnlfc2Vhc29uIj5MYSBMaWdhPC9hPiZuYnNwO3NlYXNvbiAoMjEpIGFuZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNvcGEgQW0mZWFjdXRlO3JpY2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvcGFfQW0lQzMlQTlyaWNhIj5Db3BhIEFtJmVhY3V0ZTtyaWNhPC9hPiZuYnNwOygxNykuIEhlIGFsc28gaG9sZHMgdGhlIHJlY29yZCBmb3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgbWVuJ3MgZm9vdGJhbGxlcnMgd2l0aCA1MCBvciBtb3JlIGludGVybmF0aW9uYWwgZ29hbHMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfbWVuJTI3c19mb290YmFsbGVyc193aXRoXzUwX29yX21vcmVfaW50ZXJuYXRpb25hbF9nb2FscyI+bW9zdCBpbnRlcm5hdGlvbmFsIGdvYWxzPC9hPiZuYnNwO2J5IGEgU291dGggQW1lcmljYW4gbWFsZSAoODEpLiBNZXNzaSBoYXMgc2NvcmVkIG92ZXImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgZm9vdGJhbGxlcnMgd2l0aCA1MDAgb3IgbW9yZSBnb2FscyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9mb290YmFsbGVyc193aXRoXzUwMF9vcl9tb3JlX2dvYWxzIj43NTAgc2VuaW9yIGNhcmVlciBnb2FsczwvYT4mbmJzcDtmb3IgY2x1YiBhbmQgY291bnRyeSwgYW5kIGhhcyB0aGUgbW9zdCBnb2FscyBieSBhIHBsYXllciBmb3IgYSBzaW5nbGUgY2x1Yi48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+Qm9ybiBhbmQgcmFpc2VkIGluIGNlbnRyYWwgQXJnZW50aW5hLCBNZXNzaSByZWxvY2F0ZWQgdG8gU3BhaW4gdG8gam9pbiBCYXJjZWxvbmEgYXQgYWdlIDEzLCBmb3Igd2hvbSBoZSBtYWRlIGhpcyBjb21wZXRpdGl2ZSBkZWJ1dCBhZ2VkIDE3IGluIE9jdG9iZXIgMjAwNC4gSGUgZXN0YWJsaXNoZWQgaGltc2VsZiBhcyBhbiBpbnRlZ3JhbCBwbGF5ZXIgZm9yIHRoZSBjbHViIHdpdGhpbiB0aGUgbmV4dCB0aHJlZSB5ZWFycywgYW5kIGluIGhpcyBmaXJzdCB1bmludGVycnVwdGVkIHNlYXNvbiBpbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAwOCZuZGFzaDswOSBGQyBCYXJjZWxvbmEgc2Vhc29uIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDA4JUUyJTgwJTkzMDlfRkNfQmFyY2Vsb25hX3NlYXNvbiI+MjAwOCZuZGFzaDswOTwvYT4mbmJzcDtoZSBoZWxwZWQgQmFyY2Vsb25hIGFjaGlldmUgdGhlIGZpcnN0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJUcmVibGUgKGFzc29jaWF0aW9uIGZvb3RiYWxsKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVHJlYmxlXyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPnRyZWJsZTwvYT4mbmJzcDtpbiBTcGFuaXNoIGZvb3RiYWxsOyB0aGF0IHllYXIsIGFnZWQgMjIsIE1lc3NpIHdvbiBoaXMgZmlyc3QmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMDkgQmFsbG9uIGQnT3IiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMDlfQmFsbG9uX2QlMjdPciI+QmFsbG9uIGQnT3I8L2E+LiBUaHJlZSBzdWNjZXNzZnVsIHNlYXNvbnMgZm9sbG93ZWQsIHdpdGggTWVzc2kgd2lubmluZyBmb3VyIGNvbnNlY3V0aXZlIEJhbGxvbnMgZCdPciwgbWFraW5nIGhpbSB0aGUgZmlyc3QgcGxheWVyIHRvIHdpbiB0aGUgYXdhcmQgZm91ciB0aW1lcyBhbmQgaW4gYSByb3cuPHN1cCBpZD0iY2l0ZV9yZWYtMTIiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaW9uZWxfTWVzc2kjY2l0ZV9ub3RlLTEyIj5bMTBdPC9hPjwvc3VwPiZuYnNwO0R1cmluZyB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTEmbmRhc2g7MTIgRkMgQmFyY2Vsb25hIHNlYXNvbiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxMSVFMiU4MCU5MzEyX0ZDX0JhcmNlbG9uYV9zZWFzb24iPjIwMTEmbmRhc2g7MTIgc2Vhc29uPC9hPiwgaGUgc2V0IHRoZSBMYSBMaWdhIGFuZCBFdXJvcGVhbiByZWNvcmRzIGZvciBtb3N0IGdvYWxzIHNjb3JlZCBpbiBhIHNpbmdsZSBzZWFzb24sIHdoaWxlIGVzdGFibGlzaGluZyBoaW1zZWxmIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaXN0IG9mIEZDIEJhcmNlbG9uYSByZWNvcmRzIGFuZCBzdGF0aXN0aWNzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX0ZDX0JhcmNlbG9uYV9yZWNvcmRzX2FuZF9zdGF0aXN0aWNzI1RvcF9nb2Fsc2NvcmVycyI+QmFyY2Vsb25hJ3MgYWxsLXRpbWUgdG9wIHNjb3JlcjwvYT4uIFRoZSBmb2xsb3dpbmcgdHdvIHNlYXNvbnMsIE1lc3NpIGZpbmlzaGVkIHNlY29uZCBmb3IgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJCYWxsb24gZCdPciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmFsbG9uX2QlMjdPciI+QmFsbG9uIGQnT3I8L2E+Jm5ic3A7YmVoaW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJDcmlzdGlhbm8gUm9uYWxkbyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ3Jpc3RpYW5vX1JvbmFsZG8iPkNyaXN0aWFubyBSb25hbGRvPC9hPiZuYnNwOyhoaXMgcGVyY2VpdmVkJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJNZXNzaSZuZGFzaDtSb25hbGRvIHJpdmFscnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01lc3NpJUUyJTgwJTkzUm9uYWxkb19yaXZhbHJ5Ij5jYXJlZXIgcml2YWw8L2E+KSwgYmVmb3JlIHJlZ2FpbmluZyBoaXMgYmVzdCBmb3JtIGR1cmluZyB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTQmbmRhc2g7MTUgRkMgQmFyY2Vsb25hIHNlYXNvbiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxNCVFMiU4MCU5MzE1X0ZDX0JhcmNlbG9uYV9zZWFzb24iPjIwMTQmbmRhc2g7MTUgY2FtcGFpZ248L2E+LCBiZWNvbWluZyB0aGUgYWxsLXRpbWUgdG9wIHNjb3JlciBpbiBMYSBMaWdhIGFuZCBsZWFkaW5nIEJhcmNlbG9uYSB0byBhIGhpc3RvcmljIHNlY29uZCB0cmVibGUsIGFmdGVyIHdoaWNoIGhlIHdhcyBhd2FyZGVkIGEgZmlmdGggQmFsbG9uIGQnT3IgaW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTUgRklGQSBCYWxsb24gZCdPciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxNV9GSUZBX0JhbGxvbl9kJTI3T3IiPjIwMTU8L2E+LiBNZXNzaSBhc3N1bWVkIGNhcHRhaW5jeSBvZiBCYXJjZWxvbmEgaW4gMjAxOCwgYW5kIGluIDIwMTkgaGUgd29uIGEgcmVjb3JkJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE5IEJhbGxvbiBkJ09yIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE5X0JhbGxvbl9kJTI3T3IiPnNpeHRoIEJhbGxvbiBkJ09yPC9hPi4gT3V0IG9mIGNvbnRyYWN0LCBoZSBzaWduZWQgZm9yIFBhcmlzIFNhaW50LUdlcm1haW4gaW4gQXVndXN0IDIwMjEuPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', '05042022131728c.jpg', 'striker'),
(2, 'Cristiano Ronaldo', 'striker', ' Manchester United F.C', '2022-04-14', '50', '6', 'Hospital Dr. N&eacute;lio Mendon&ccedil;a, Funchal, Portugal', ' Portuguese', '70', '150', 'Portuguese footballer', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+PHN0cm9uZz5DcmlzdGlhbm8gUm9uYWxkbyBkb3MgU2FudG9zIEF2ZWlybzwvc3Ryb25nPiZuYnNwOzxzcGFuIGNsYXNzPSJub2V4Y2VycHQgbm93cmFwbGlua3MiIHN0eWxlPSJmb250LXNpemU6IDExLjlweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IiB0aXRsZT0iT3JkZXIgb2YgUHJpbmNlIEhlbnJ5IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9PcmRlcl9vZl9QcmluY2VfSGVucnkiPkdPSUg8L2E+Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsiIHRpdGxlPSJPcmRlciBvZiBNZXJpdCAoUG9ydHVnYWwpIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9PcmRlcl9vZl9NZXJpdF8oUG9ydHVnYWwpIj5Db21NPC9hPjwvc3Bhbj4mbmJzcDsoPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZTogMTEuOXB4OyI+UG9ydHVndWVzZSBwcm9udW5jaWF0aW9uOiZuYnNwOzwvc3Bhbj48c3BhbiBjbGFzcz0iSVBBIiB0aXRsZT0iUmVwcmVzZW50YXRpb24gaW4gdGhlIEludGVybmF0aW9uYWwgUGhvbmV0aWMgQWxwaGFiZXQgKElQQSkiPjxhIHN0eWxlPSJjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmUgIWltcG9ydGFudDsiIHRpdGxlPSJIZWxwOklQQS9Qb3J0dWd1ZXNlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IZWxwOklQQS9Qb3J0dWd1ZXNlIj5ba8m+acqDy4h0asmQbnUgyoHJlMuIbmHJq2R1XTwvYT48L3NwYW4+OyBib3JuIDUgRmVicnVhcnkgMTk4NSkgaXMgYSBQb3J0dWd1ZXNlIHByb2Zlc3Npb25hbCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQXNzb2NpYXRpb24gZm9vdGJhbGwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Fzc29jaWF0aW9uX2Zvb3RiYWxsIj5mb290YmFsbGVyPC9hPiZuYnNwO3dobyBwbGF5cyBhcyBhJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJGb3J3YXJkIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ZvcndhcmRfKGFzc29jaWF0aW9uX2Zvb3RiYWxsKSI+Zm9yd2FyZDwvYT4mbmJzcDtmb3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlByZW1pZXIgTGVhZ3VlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9QcmVtaWVyX0xlYWd1ZSI+UHJlbWllciBMZWFndWU8L2E+Jm5ic3A7Y2x1YiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTWFuY2hlc3RlciBVbml0ZWQgRi5DLiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTWFuY2hlc3Rlcl9Vbml0ZWRfRi5DLiI+TWFuY2hlc3RlciBVbml0ZWQ8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJDYXB0YWluIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NhcHRhaW5fKGFzc29jaWF0aW9uX2Zvb3RiYWxsKSI+Y2FwdGFpbnM8L2E+Jm5ic3A7dGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJQb3J0dWdhbCBuYXRpb25hbCBmb290YmFsbCB0ZWFtIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Qb3J0dWdhbF9uYXRpb25hbF9mb290YmFsbF90ZWFtIj5Qb3J0dWdhbCBuYXRpb25hbCB0ZWFtPC9hPi4gT2Z0ZW4gY29uc2lkZXJlZCB0aGUgYmVzdCBwbGF5ZXIgaW4gdGhlIHdvcmxkIGFuZCB3aWRlbHkgcmVnYXJkZWQgYXMgb25lIG9mIHRoZSBncmVhdGVzdCBwbGF5ZXJzIG9mIGFsbCB0aW1lLCBSb25hbGRvIGhhcyB3b24gZml2ZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQmFsbG9uIGQnT3IiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JhbGxvbl9kJTI3T3IiPkJhbGxvbiBkJ09yPC9hPiZuYnNwO2F3YXJkczxzdXAgaWQ9ImNpdGVfcmVmLTEwIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ3Jpc3RpYW5vX1JvbmFsZG8jY2l0ZV9ub3RlLTEwIj5bbm90ZSAzXTwvYT48L3N1cD4mbmJzcDthbmQgZm91ciZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRXVyb3BlYW4gR29sZGVuIFNob2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V1cm9wZWFuX0dvbGRlbl9TaG9lIj5FdXJvcGVhbiBHb2xkZW4gU2hvZXM8L2E+LCB0aGUgbW9zdCBieSBhIEV1cm9wZWFuIHBsYXllci4gSGUgaGFzIHdvbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlzdCBvZiBjYXJlZXIgYWNoaWV2ZW1lbnRzIGJ5IENyaXN0aWFubyBSb25hbGRvIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX2NhcmVlcl9hY2hpZXZlbWVudHNfYnlfQ3Jpc3RpYW5vX1JvbmFsZG8jQ29sbGVjdGl2ZV9hd2FyZHMiPjMyIHRyb3BoaWVzIGluIGhpcyBjYXJlZXI8L2E+LCBpbmNsdWRpbmcgc2V2ZW4gbGVhZ3VlIHRpdGxlcywgZml2ZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9VRUZBX0NoYW1waW9uc19MZWFndWUiPlVFRkEgQ2hhbXBpb25zIExlYWd1ZXM8L2E+LCBvbmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlVFRkEgRXVyb3BlYW4gQ2hhbXBpb25zaGlwIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9VRUZBX0V1cm9wZWFuX0NoYW1waW9uc2hpcCI+VUVGQSBFdXJvcGVhbiBDaGFtcGlvbnNoaXA8L2E+LCBhbmQgb25lJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJVRUZBIE5hdGlvbnMgTGVhZ3VlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9VRUZBX05hdGlvbnNfTGVhZ3VlIj5VRUZBIE5hdGlvbnMgTGVhZ3VlPC9hPi4gUm9uYWxkbyBob2xkcyB0aGUgcmVjb3JkcyBmb3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkV1cm9wZWFuIEN1cCBhbmQgVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIHJlY29yZHMgYW5kIHN0YXRpc3RpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V1cm9wZWFuX0N1cF9hbmRfVUVGQV9DaGFtcGlvbnNfTGVhZ3VlX3JlY29yZHNfYW5kX3N0YXRpc3RpY3MjUGxheWVycyI+bW9zdCBhcHBlYXJhbmNlczwvYT4mbmJzcDsoMTgzKSwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIHRvcCBzY29yZXJzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX1VFRkFfQ2hhbXBpb25zX0xlYWd1ZV90b3Bfc2NvcmVycyNBbGwtdGltZV90b3Bfc2NvcmVycyI+bW9zdCBnb2FsczwvYT4mbmJzcDsoMTQwKSwgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJFdXJvcGVhbiBDdXAgYW5kIFVFRkEgQ2hhbXBpb25zIExlYWd1ZSByZWNvcmRzIGFuZCBzdGF0aXN0aWNzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FdXJvcGVhbl9DdXBfYW5kX1VFRkFfQ2hhbXBpb25zX0xlYWd1ZV9yZWNvcmRzX2FuZF9zdGF0aXN0aWNzI0FsbC10aW1lX3RvcF9wcm92aWRlcnMiPmFzc2lzdHM8L2E+Jm5ic3A7KDQyKSBpbiB0aGUgQ2hhbXBpb25zIExlYWd1ZSwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgVUVGQSBFdXJvcGVhbiBDaGFtcGlvbnNoaXAgZ29hbHNjb3JlcnMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpc3Rfb2ZfVUVGQV9FdXJvcGVhbl9DaGFtcGlvbnNoaXBfZ29hbHNjb3JlcnMjT3ZlcmFsbF90b3BfZ29hbHNjb3JlcnMiPm1vc3QgZ29hbHMgaW4gdGhlIEV1cm9wZWFuIENoYW1waW9uc2hpcDwvYT4mbmJzcDsoMTQpLCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlzdCBvZiBtZW4ncyBmb290YmFsbGVycyB3aXRoIDUwIG9yIG1vcmUgaW50ZXJuYXRpb25hbCBnb2FscyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9tZW4lMjdzX2Zvb3RiYWxsZXJzX3dpdGhfNTBfb3JfbW9yZV9pbnRlcm5hdGlvbmFsX2dvYWxzIj5tb3N0IGludGVybmF0aW9uYWwgZ29hbHMgYnkgYSBtYWxlIHBsYXllcjwvYT4mbmJzcDsoMTE1KSwgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaXN0IG9mIG1lbidzIGZvb3RiYWxsZXJzIHdpdGggMTAwIG9yIG1vcmUgaW50ZXJuYXRpb25hbCBjYXBzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX21lbiUyN3NfZm9vdGJhbGxlcnNfd2l0aF8xMDBfb3JfbW9yZV9pbnRlcm5hdGlvbmFsX2NhcHMiPm1vc3QgaW50ZXJuYXRpb25hbCBhcHBlYXJhbmNlczwvYT4mbmJzcDtieSBhIEV1cm9wZWFuIG1hbGUgKDE4NikuIEhlIGlzIG9uZSBvZiB0aGUgZmV3IHBsYXllcnMgdG8gaGF2ZSBtYWRlIG92ZXImbmJzcDs8YSBzdHlsZT0iY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX21lbiUyN3NfZm9vdGJhbGxlcnNfd2l0aF90aGVfbW9zdF9vZmZpY2lhbF9hcHBlYXJhbmNlcyI+MSwxMDAgcHJvZmVzc2lvbmFsIGNhcmVlciBhcHBlYXJhbmNlczwvYT4sIGFuZCBoYXMgc2NvcmVkIG92ZXImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgZm9vdGJhbGxlcnMgd2l0aCA1MDAgb3IgbW9yZSBnb2FscyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9mb290YmFsbGVyc193aXRoXzUwMF9vcl9tb3JlX2dvYWxzIj44MDAgb2ZmaWNpYWwgc2VuaW9yIGNhcmVlciBnb2FsczwvYT4mbmJzcDtmb3IgY2x1YiBhbmQgY291bnRyeS48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+Qm9ybiBhbmQgcmFpc2VkIGluJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJNYWRlaXJhIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NYWRlaXJhIj5NYWRlaXJhPC9hPiwgUm9uYWxkbyBiZWdhbiBoaXMgc2VuaW9yIGNsdWIgY2FyZWVyIHBsYXlpbmcgZm9yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJTcG9ydGluZyBDUCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU3BvcnRpbmdfQ1AiPlNwb3J0aW5nIENQPC9hPiwgYmVmb3JlIHNpZ25pbmcgd2l0aCBNYW5jaGVzdGVyIFVuaXRlZCBpbiAyMDAzLCBhZ2VkIDE4LCB3aW5uaW5nIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRkEgQ3VwIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9GQV9DdXAiPkZBIEN1cDwvYT4mbmJzcDtpbiBoaXMgZmlyc3Qgc2Vhc29uLiBIZSB3b3VsZCBhbHNvIGdvIG9udG8gd2luIHRocmVlIGNvbnNlY3V0aXZlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJQcmVtaWVyIExlYWd1ZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUHJlbWllcl9MZWFndWUiPlByZW1pZXIgTGVhZ3VlPC9hPiZuYnNwO3RpdGxlcywgdGhlIENoYW1waW9ucyBMZWFndWUgYW5kIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRklGQSBDbHViIFdvcmxkIEN1cCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRklGQV9DbHViX1dvcmxkX0N1cCI+RklGQSBDbHViIFdvcmxkIEN1cDwvYT47IGF0IGFnZSAyMywgaGUgd29uIGhpcyBmaXJzdCBCYWxsb24gZCdPci4gUm9uYWxkbyB3YXMgdGhlIHN1YmplY3Qgb2YgdGhlIHRoZW4tPGEgY2xhc3M9Im13LXJlZGlyZWN0IiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ik1vc3QgZXhwZW5zaXZlIGFzc29jaWF0aW9uIGZvb3RiYWxsIHRyYW5zZmVyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Nb3N0X2V4cGVuc2l2ZV9hc3NvY2lhdGlvbl9mb290YmFsbF90cmFuc2ZlciI+bW9zdCBleHBlbnNpdmUgYXNzb2NpYXRpb24gZm9vdGJhbGwgdHJhbnNmZXI8L2E+Jm5ic3A7d2hlbiBoZSBzaWduZWQgZm9yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJSZWFsIE1hZHJpZCBDRiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUmVhbF9NYWRyaWRfQ0YiPlJlYWwgTWFkcmlkPC9hPiZuYnNwO2luIDIwMDkgaW4gYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVHJhbnNmZXIgKGFzc29jaWF0aW9uIGZvb3RiYWxsKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVHJhbnNmZXJfKGFzc29jaWF0aW9uX2Zvb3RiYWxsKSI+dHJhbnNmZXI8L2E+Jm5ic3A7d29ydGggJmV1cm87OTQmbmJzcDttaWxsaW9uICgmcG91bmQ7ODAmbmJzcDttaWxsaW9uKSwgd2hlcmUgaGUgd29uIDE1IHRyb3BoaWVzLCBpbmNsdWRpbmcgdHdvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMYSBMaWdhIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MYV9MaWdhIj5MYSBMaWdhPC9hPiZuYnNwO3RpdGxlcywgdHdvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJDb3BhIGRlbCBSZXkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvcGFfZGVsX1JleSI+Q29wYSBkZWwgUmV5PC9hPiwgYW5kIGZvdXIgQ2hhbXBpb25zIExlYWd1ZXMsIGFuZCBiZWNhbWUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgUmVhbCBNYWRyaWQgQ0YgcmVjb3JkcyBhbmQgc3RhdGlzdGljcyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9SZWFsX01hZHJpZF9DRl9yZWNvcmRzX2FuZF9zdGF0aXN0aWNzI0dvYWxzY29yZXJzIj50aGUgY2x1YidzIGFsbC10aW1lIHRvcCBnb2Fsc2NvcmVyPC9hPi4gSGUgd29uIGJhY2stdG8tYmFjayBCYWxsb25zIGQnT3IgaW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTMgRklGQSBCYWxsb24gZCdPciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxM19GSUZBX0JhbGxvbl9kJTI3T3IiPjIwMTM8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE0IEZJRkEgQmFsbG9uIGQnT3IiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTRfRklGQV9CYWxsb25fZCUyN09yIj4yMDE0PC9hPiwgYW5kIGFnYWluIGluJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE2IEJhbGxvbiBkJ09yIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE2X0JhbGxvbl9kJTI3T3IiPjIwMTY8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE3IEJhbGxvbiBkJ09yIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE3X0JhbGxvbl9kJTI3T3IiPjIwMTc8L2E+LCBhbmQgd2FzIHJ1bm5lci11cCB0aHJlZSB0aW1lcyBiZWhpbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpb25lbCBNZXNzaSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlvbmVsX01lc3NpIj5MaW9uZWwgTWVzc2k8L2E+LCBoaXMgcGVyY2VpdmVkJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJNZXNzaSZuZGFzaDtSb25hbGRvIHJpdmFscnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01lc3NpJUUyJTgwJTkzUm9uYWxkb19yaXZhbHJ5Ij5jYXJlZXIgcml2YWw8L2E+LiBJbiAyMDE4LCBoZSBzaWduZWQgZm9yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJKdXZlbnR1cyBGLkMuIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9KdXZlbnR1c19GLkMuIj5KdXZlbnR1czwvYT4mbmJzcDtpbiBhIHRyYW5zZmVyIHdvcnRoIGFuIGluaXRpYWwgJmV1cm87MTAwJm5ic3A7bWlsbGlvbiAoJnBvdW5kOzg4Jm5ic3A7bWlsbGlvbiksIHRoZSBtb3N0IGV4cGVuc2l2ZSB0cmFuc2ZlciBmb3IgYW4gSXRhbGlhbiBjbHViIGFuZCB0aGUgbW9zdCBleHBlbnNpdmUgdHJhbnNmZXIgZm9yIGEgcGxheWVyIG92ZXIgMzAgeWVhcnMgb2xkLiBIZSB3b24gdHdvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJTZXJpZSBBIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9TZXJpZV9BIj5TZXJpZSBBPC9hPiZuYnNwO3RpdGxlcywgdHdvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJTdXBlcmNvcHBhIEl0YWxpYW5hIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9TdXBlcmNvcHBhX0l0YWxpYW5hIj5TdXBlcmNvcHBlIEl0YWxpYW5hPC9hPiwgYW5kIGEmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNvcHBhIEl0YWxpYSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29wcGFfSXRhbGlhIj5Db3BwYSBJdGFsaWE8L2E+LCBiZWZvcmUgcmV0dXJuaW5nIHRvIE1hbmNoZXN0ZXIgVW5pdGVkIGluIDIwMjEuPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', '05042022131621a.jpg', 'striker'),
(3, 'Neymar ', 'striker', 'Paris Saint-Germain F.C. ', '2022-04-06', '75', '5.7', 'Brazil', 'Paris Saint', '60', '140', 'Paris Saint-Germain F.C. ', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+PHN0cm9uZz5OZXltYXIgZGEgU2lsdmEgU2FudG9zIEomdWFjdXRlO25pb3I8L3N0cm9uZz4mbmJzcDsoYm9ybiA1IEZlYnJ1YXJ5IDE5OTIpLCBrbm93biBhcyZuYnNwOzxzdHJvbmc+TmV5bWFyPC9zdHJvbmc+LCBpcyBhIEJyYXppbGlhbiBwcm9mZXNzaW9uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkFzc29jaWF0aW9uIGZvb3RiYWxsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Bc3NvY2lhdGlvbl9mb290YmFsbCI+Zm9vdGJhbGxlcjwvYT4mbmJzcDt3aG8gcGxheXMgYXMgYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRm9yd2FyZCAoYXNzb2NpYXRpb24gZm9vdGJhbGwpIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Gb3J3YXJkXyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPmZvcndhcmQ8L2E+Jm5ic3A7Zm9yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaWd1ZSAxIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaWd1ZV8xIj5MaWd1ZSAxPC9hPiZuYnNwO2NsdWImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlBhcmlzIFNhaW50LUdlcm1haW4gRi5DLiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUGFyaXNfU2FpbnQtR2VybWFpbl9GLkMuIj5QYXJpcyBTYWludC1HZXJtYWluPC9hPiZuYnNwO2FuZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkJyYXppbCBuYXRpb25hbCBmb290YmFsbCB0ZWFtIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CcmF6aWxfbmF0aW9uYWxfZm9vdGJhbGxfdGVhbSI+QnJhemlsIG5hdGlvbmFsIHRlYW08L2E+LiBIZSBpcyB3aWRlbHkgcmVnYXJkZWQgYXMgb25lIG9mIHRoZSBiZXN0IHBsYXllcnMgaW4gdGhlIHdvcmxkLjxzdXAgaWQ9ImNpdGVfcmVmLTciIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9OZXltYXIjY2l0ZV9ub3RlLTciPls3XTwvYT48L3N1cD48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+TmV5bWFyIGNhbWUgaW50byBwcm9taW5lbmNlIGF0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJTYW50b3MgRkMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1NhbnRvc19GQyI+U2FudG9zPC9hPiwgd2hlcmUgaGUgbWFkZSBoaXMgcHJvZmVzc2lvbmFsIGRlYnV0IGFnZWQgMTcuIEhlIGhlbHBlZCB0aGUgY2x1YiB3aW4gdHdvIHN1Y2Nlc3NpdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNhbXBlb25hdG8gUGF1bGlzdGEiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NhbXBlb25hdG9fUGF1bGlzdGEiPkNhbXBlb25hdG8gUGF1bGlzdGE8L2E+Jm5ic3A7Y2hhbXBpb25zaGlwcywgYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iQ29wYSBkbyBCcmFzaWwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvcGFfZG9fQnJhc2lsIj5Db3BhIGRvIEJyYXNpbDwvYT4sIGFuZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTEgQ29wYSBMaWJlcnRhZG9yZXMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTFfQ29wYV9MaWJlcnRhZG9yZXMiPjIwMTEgQ29wYSBMaWJlcnRhZG9yZXM8L2E+OyB0aGUgbGF0dGVyIGJlaW5nIFNhbnRvcycgZmlyc3Qgc2luY2UgMTk2My4gTmV5bWFyIHdhcyB0d2ljZSBuYW1lZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlNvdXRoIEFtZXJpY2FuIEZvb3RiYWxsZXIgb2YgdGhlIFllYXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1NvdXRoX0FtZXJpY2FuX0Zvb3RiYWxsZXJfb2ZfdGhlX1llYXIiPlNvdXRoIEFtZXJpY2FuIEZvb3RiYWxsZXIgb2YgdGhlIFllYXI8L2E+LCBpbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAxMSBTb3V0aCBBbWVyaWNhbiBGb290YmFsbGVyIG9mIHRoZSBZZWFyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDExX1NvdXRoX0FtZXJpY2FuX0Zvb3RiYWxsZXJfb2ZfdGhlX1llYXIiPjIwMTE8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDEyIFNvdXRoIEFtZXJpY2FuIEZvb3RiYWxsZXIgb2YgdGhlIFllYXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTJfU291dGhfQW1lcmljYW5fRm9vdGJhbGxlcl9vZl90aGVfWWVhciI+MjAxMjwvYT4sIGFuZCBzb29uIHJlbG9jYXRlZCB0byBFdXJvcGUgdG8gam9pbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRkMgQmFyY2Vsb25hIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9GQ19CYXJjZWxvbmEiPkJhcmNlbG9uYTwvYT4uIEFzIHBhcnQgb2YgQmFyY2Vsb25hJ3MgYXR0YWNraW5nIHRyaW8gd2l0aCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iTGlvbmVsIE1lc3NpIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaW9uZWxfTWVzc2kiPkxpb25lbCBNZXNzaTwvYT4mbmJzcDthbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikx1aXMgU3UmYWFjdXRlO3JleiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTHVpc19TdSVDMyVBMXJleiI+THVpcyBTdSZhYWN1dGU7cmV6PC9hPiwgaGUgd29uIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVHJlYmxlIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1RyZWJsZV8oYXNzb2NpYXRpb25fZm9vdGJhbGwpIj5jb250aW5lbnRhbCB0cmVibGU8L2E+Jm5ic3A7b2YmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkxhIExpZ2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xhX0xpZ2EiPkxhIExpZ2E8L2E+LCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNvcGEgZGVsIFJleSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29wYV9kZWxfUmV5Ij5Db3BhIGRlbCBSZXk8L2E+LCBhbmQgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJVRUZBIENoYW1waW9ucyBMZWFndWUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1VFRkFfQ2hhbXBpb25zX0xlYWd1ZSI+VUVGQSBDaGFtcGlvbnMgTGVhZ3VlPC9hPiwgYW5kIGZpbmlzaGVkIHRoaXJkIGZvciB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkZJRkEgQmFsbG9uIGQnT3IiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ZJRkFfQmFsbG9uX2QlMjdPciI+RklGQSBCYWxsb24gZCdPcjwvYT4mbmJzcDtpbiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAxNSBGSUZBIEJhbGxvbiBkJ09yIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE1X0ZJRkFfQmFsbG9uX2QlMjdPciI+MjAxNTwvYT4mbmJzcDtmb3IgaGlzIHBlcmZvcm1hbmNlcy4gSGUgdGhlbiBhdHRhaW5lZCBhJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJEb3VibGUgKGFzc29jaWF0aW9uIGZvb3RiYWxsKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRG91YmxlXyhhc3NvY2lhdGlvbl9mb290YmFsbCkiPmRvbWVzdGljIGRvdWJsZTwvYT4mbmJzcDtpbiB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTUmbmRhc2g7MTYgRkMgQmFyY2Vsb25hIHNlYXNvbiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxNSVFMiU4MCU5MzE2X0ZDX0JhcmNlbG9uYV9zZWFzb24iPjIwMTUmbmRhc2g7MTYgc2Vhc29uPC9hPi4gSW4gMjAxNywgTmV5bWFyIHRyYW5zZmVycmVkIHRvIFBhcmlzIFNhaW50LUdlcm1haW4gaW4gYSBtb3ZlIHdvcnRoICZldXJvOzIyMiBtaWxsaW9uLCBtYWtpbmcgaGltJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaXN0IG9mIG1vc3QgZXhwZW5zaXZlIGFzc29jaWF0aW9uIGZvb3RiYWxsIHRyYW5zZmVycyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9tb3N0X2V4cGVuc2l2ZV9hc3NvY2lhdGlvbl9mb290YmFsbF90cmFuc2ZlcnMiPnRoZSBtb3N0IGV4cGVuc2l2ZSBwbGF5ZXIgZXZlcjwvYT4uPHN1cCBpZD0iY2l0ZV9yZWYtMTAiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9OZXltYXIjY2l0ZV9ub3RlLTEwIj5bbm90ZSAxXTwvYT48L3N1cD4mbmJzcDtJbiBGcmFuY2UsIE5leW1hciB3b24gdGhyZWUgbGVhZ3VlIHRpdGxlcywgdGhyZWUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkNvdXBlIGRlIEZyYW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ291cGVfZGVfRnJhbmNlIj5Db3VwZSBkZSBGcmFuY2U8L2E+LCBhbmQgdHdvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJDb3VwZSBkZSBsYSBMaWd1ZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ291cGVfZGVfbGFfTGlndWUiPkNvdXBlIGRlIGxhIExpZ3VlPC9hPiwgd2hpY2ggaW5jbHVkZWQgYSBkb21lc3RpYyB0cmVibGUgYW5kIGJlaW5nIHZvdGVkJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaWd1ZSAxIFBsYXllciBvZiB0aGUgWWVhciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlndWVfMV9QbGF5ZXJfb2ZfdGhlX1llYXIiPkxpZ3VlIDEgUGxheWVyIG9mIHRoZSBZZWFyPC9hPiZuYnNwO2luIGhpcyBkZWJ1dCBzZWFzb24uPHN1cCBpZD0iY2l0ZV9yZWYtMTEiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9OZXltYXIjY2l0ZV9ub3RlLTExIj5bMTBdPC9hPjwvc3VwPiZuYnNwO05leW1hciBoZWxwZWQgUFNHIGF0dGFpbiBhIGRvbWVzdGljJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMaXN0IG9mIGFzc29jaWF0aW9uIGZvb3RiYWxsIHRlYW1zIHRvIGhhdmUgd29uIGZvdXIgb3IgbW9yZSB0cm9waGllcyBpbiBvbmUgc2Vhc29uIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXN0X29mX2Fzc29jaWF0aW9uX2Zvb3RiYWxsX3RlYW1zX3RvX2hhdmVfd29uX2ZvdXJfb3JfbW9yZV90cm9waGllc19pbl9vbmVfc2Vhc29uIj5xdWFkcnVwbGU8L2E+Jm5ic3A7aW4gdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE5Jm5kYXNoOzIwIFBhcmlzIFNhaW50LUdlcm1haW4gRi5DLiBzZWFzb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTklRTIlODAlOTMyMF9QYXJpc19TYWludC1HZXJtYWluX0YuQy5fc2Vhc29uIj4yMDE5Jm5kYXNoOzIwIHNlYXNvbjwvYT4sIGFuZCBsZWQgdGhlIGNsdWIgdG8gaXRzIGZpcnN0IGV2ZXImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMjAgVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIEZpbmFsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDIwX1VFRkFfQ2hhbXBpb25zX0xlYWd1ZV9GaW5hbCI+Q2hhbXBpb25zIExlYWd1ZSBGaW5hbDwvYT4uPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPldpdGggNzEgZ29hbHMgaW4gMTE3IG1hdGNoZXMgZm9yIEJyYXppbCBzaW5jZSBkZWJ1dGluZyBhdCBhZ2UgMTgsIE5leW1hciBpcyB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkJyYXppbCBuYXRpb25hbCBmb290YmFsbCB0ZWFtIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CcmF6aWxfbmF0aW9uYWxfZm9vdGJhbGxfdGVhbSNUb3BfZ29hbHNjb3JlcnMiPnNlY29uZCBoaWdoZXN0IGdvYWxzY29yZXI8L2E+Jm5ic3A7Zm9yIGhpcyBuYXRpb25hbCB0ZWFtLCB0cmFpbGluZyZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iUGVsJmVhY3V0ZTsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BlbCVDMyVBOSI+UGVsJmVhY3V0ZTs8L2E+LiBIZSB3YXMgYSBrZXkgcGxheWVyIGluIEJyYXppbCdzIHZpY3RvcmllcyBhdCB0aGUmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAxMSBTb3V0aCBBbWVyaWNhbiBZb3V0aCBDaGFtcGlvbnNoaXAiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTFfU291dGhfQW1lcmljYW5fWW91dGhfQ2hhbXBpb25zaGlwIj4yMDExIFNvdXRoIEFtZXJpY2FuIFlvdXRoIENoYW1waW9uc2hpcDwvYT4sIHdoZXJlIGhlIGZpbmlzaGVkIGFzIGxlYWRpbmcgZ29hbHNjb3JlciwgYW5kIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAxMyBGSUZBIENvbmZlZGVyYXRpb25zIEN1cCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxM19GSUZBX0NvbmZlZGVyYXRpb25zX0N1cCI+MjAxMyBGSUZBIENvbmZlZGVyYXRpb25zIEN1cDwvYT4sIHdoZXJlIGhlIHdvbiB0aGUmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iR29sZGVuIEJhbGwgKEZJRkEgQ29uZmVkZXJhdGlvbnMgQ3VwKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvR29sZGVuX0JhbGxfKEZJRkFfQ29uZmVkZXJhdGlvbnNfQ3VwKSI+R29sZGVuIEJhbGw8L2E+LiBIaXMgcGFydGljaXBhdGlvbiBpbiB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTQgRklGQSBXb3JsZCBDdXAiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTRfRklGQV9Xb3JsZF9DdXAiPjIwMTQgRklGQSBXb3JsZCBDdXA8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE1IENvcGEgQW0mZWFjdXRlO3JpY2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTVfQ29wYV9BbSVDMyVBOXJpY2EiPjIwMTUgQ29wYSBBbSZlYWN1dGU7cmljYTwvYT4mbmJzcDt3YXMgY3V0IHNob3J0IGJ5IGluanVyeSBhbmQgYSBzdXNwZW5zaW9uLCByZXNwZWN0aXZlbHksIGJlZm9yZSBjYXB0YWluaW5nIEJyYXppbCB0byB0aGVpciBmaXJzdCBPbHltcGljIGdvbGQgbWVkYWwgaW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkZvb3RiYWxsIGF0IHRoZSAyMDE2IFN1bW1lciBPbHltcGljcyAmbmRhc2g7IE1lbidzIHRvdXJuYW1lbnQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Zvb3RiYWxsX2F0X3RoZV8yMDE2X1N1bW1lcl9PbHltcGljc18lRTIlODAlOTNfTWVuJTI3c190b3VybmFtZW50Ij5tZW4ncyBmb290YmFsbDwvYT4mbmJzcDthdCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTYgU3VtbWVyIE9seW1waWNzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE2X1N1bW1lcl9PbHltcGljcyI+MjAxNiBTdW1tZXIgT2x5bXBpY3M8L2E+LiBIYXZpbmcgcmVub3VuY2VkIHRoZSBjYXB0YWluY3ksIGhlIGZlYXR1cmVkIGF0IHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE4X0ZJRkFfV29ybGRfQ3VwIj4yMDE4IEZJRkEgV29ybGQgQ3VwPC9hPiwgYW5kIGFmdGVyIG1pc3NpbmcgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDE5IENvcGEgQW0mZWFjdXRlO3JpY2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTlfQ29wYV9BbSVDMyVBOXJpY2EiPjIwMTkgQ29wYSBBbSZlYWN1dGU7cmljYTwvYT4mbmJzcDt0aHJvdWdoIGluanVyeSwgaGVscGVkIEJyYXppbCB0byBhIHJ1bm5lci11cCBmaW5pc2ggYXQgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDIxIENvcGEgQW0mZWFjdXRlO3JpY2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMjFfQ29wYV9BbSVDMyVBOXJpY2EiPjIwMjEgdG91cm5hbWVudDwvYT4uPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', '05042022131514b.jpg', 'striker');
INSERT INTO `team_sheet` (`id`, `name`, `position`, `team`, `born`, `weight`, `height`, `birth_place`, `cityzenship`, `matches`, `goals`, `present_club`, `overview`, `image`, `link`) VALUES
(7, 'Robert Lewandowski', 'striker', 'Polish football player', '2022-04-05', '65', '6', 'Warsaw, Poland', 'Warsaw, Poland', '90', '180', 'Poland national football team', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+PHN0cm9uZz5Sb2JlcnQgTGV3YW5kb3dza2k8L3N0cm9uZz4mbmJzcDsoPHNtYWxsIHN0eWxlPSJmb250LXNpemU6IDExLjlweDsiPlBvbGlzaCBwcm9udW5jaWF0aW9uOiZuYnNwOzwvc21hbGw+PHNwYW4gY2xhc3M9IklQQSIgdGl0bGU9IlJlcHJlc2VudGF0aW9uIGluIHRoZSBJbnRlcm5hdGlvbmFsIFBob25ldGljIEFscGhhYmV0IChJUEEpIj48YSBzdHlsZT0iY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lICFpbXBvcnRhbnQ7IiB0aXRsZT0iSGVscDpJUEEvUG9saXNoIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IZWxwOklQQS9Qb2xpc2giPlvLiHLJlGLJm3J0IGzJm3ZhbsuIZMmUZnNryrJpXTwvYT48L3NwYW4+Jm5ic3A7PHNwYW4gY2xhc3M9Im5vd3JhcCIgc3R5bGU9IndoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuOXB4OyI+KDxzcGFuIGNsYXNzPSJ1bmljb2RlIGhhdWRpbyI+PHNwYW4gY2xhc3M9ImZuIj48c3BhbiBzdHlsZT0ibWFyZ2luLXJpZ2h0OiAwLjI1ZW07Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkFib3V0IHRoaXMgc291bmQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ZpbGU6UGwtUm9iZXJ0X0xld2FuZG93c2tpLm9nZyI+PGltZyBzdHlsZT0iYm9yZGVyOiAwcHg7IHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7IG1hcmdpbjogMHB4OyIgc3JjPSJodHRwczovL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzExcHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyIgc3Jjc2V0PSIvL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzE3cHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyAxLjV4LCAvL3VwbG9hZC53aWtpbWVkaWEub3JnL3dpa2lwZWRpYS9jb21tb25zL3RodW1iLzgvOGEvTG91ZHNwZWFrZXIuc3ZnLzIycHgtTG91ZHNwZWFrZXIuc3ZnLnBuZyAyeCIgYWx0PSJhdWRpbyBzcGVha2VyIGljb24iIHdpZHRoPSIxMSIgaGVpZ2h0PSIxMSIgZGF0YS1maWxlLXdpZHRoPSIyMCIgZGF0YS1maWxlLWhlaWdodD0iMjAiIC8+PC9hPjwvc3Bhbj48YSBjbGFzcz0iaW50ZXJuYWwiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iUGwtUm9iZXJ0IExld2FuZG93c2tpLm9nZyIgaHJlZj0iaHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy83Lzc0L1BsLVJvYmVydF9MZXdhbmRvd3NraS5vZ2ciPmxpc3RlbjwvYT48L3NwYW4+PC9zcGFuPik8L3NwYW4+OyBib3JuIDIxIEF1Z3VzdCAxOTg4KSBpcyBhIFBvbGlzaCBwcm9mZXNzaW9uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkFzc29jaWF0aW9uIGZvb3RiYWxsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Bc3NvY2lhdGlvbl9mb290YmFsbCI+Zm9vdGJhbGxlcjwvYT4mbmJzcDt3aG8gcGxheXMgYXMgYSZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJTdHJpa2VyIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1N0cmlrZXJfKGFzc29jaWF0aW9uX2Zvb3RiYWxsKSI+c3RyaWtlcjwvYT4mbmJzcDtmb3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkJ1bmRlc2xpZ2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1bmRlc2xpZ2EiPkJ1bmRlc2xpZ2E8L2E+Jm5ic3A7Y2x1YiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRkMgQmF5ZXJuIE11bmljaCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRkNfQmF5ZXJuX011bmljaCI+QmF5ZXJuIE11bmljaDwvYT4mbmJzcDthbmQgaXMgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJDYXB0YWluIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NhcHRhaW5fKGFzc29jaWF0aW9uX2Zvb3RiYWxsKSI+Y2FwdGFpbjwvYT4mbmJzcDtvZiB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlBvbGFuZCBuYXRpb25hbCBmb290YmFsbCB0ZWFtIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Qb2xhbmRfbmF0aW9uYWxfZm9vdGJhbGxfdGVhbSI+UG9sYW5kIG5hdGlvbmFsIHRlYW08L2E+LiBSZWNvZ25pemVkIGZvciBoaXMgcG9zaXRpb25pbmcsIHRlY2huaXF1ZSBhbmQgZmluaXNoaW5nLCBMZXdhbmRvd3NraSBpcyBjb25zaWRlcmVkIG9uZSBvZiB0aGUgYmVzdCBzdHJpa2VycyBvZiBhbGwgdGltZSwgYXMgd2VsbCBhcyBvbmUgb2YgdGhlIG1vc3Qgc3VjY2Vzc2Z1bCBwbGF5ZXJzIGluIEJ1bmRlc2xpZ2EgaGlzdG9yeS4gSGUgaGFzIHNjb3JlZCBvdmVyJm5ic3A7PGEgY2xhc3M9Im13LXJlZGlyZWN0IiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9Ikxpc3Qgb2YgbWVuJ3MgZm9vdGJhbGxlcnMgd2l0aCA1MDAgb3IgbW9yZSBnb2FscyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTGlzdF9vZl9tZW4lMjdzX2Zvb3RiYWxsZXJzX3dpdGhfNTAwX29yX21vcmVfZ29hbHMiPjYwMCBzZW5pb3IgY2FyZWVyIGdvYWxzPC9hPiZuYnNwO2ZvciBjbHViIGFuZCBjb3VudHJ5LjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5BZnRlciBiZWluZyB0aGUgdG9wIHNjb3JlciBpbiB0aGUgdGhpcmQgYW5kIHNlY29uZCB0aWVycyBvZiBQb2xpc2ggZm9vdGJhbGwgd2l0aCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iWm5pY3ogUHJ1c3prJm9hY3V0ZTt3IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9abmljel9QcnVzemslQzMlQjN3Ij5abmljeiBQcnVzemsmb2FjdXRlO3c8L2E+LCBMZXdhbmRvd3NraSBtb3ZlZCB0byB0b3AtZmxpZ2h0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJMZWNoIFBvem5hxYQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xlY2hfUG96bmElQzUlODQiPkxlY2ggUG96bmHFhDwvYT4sIGhlbHBpbmcgdGhlIHRlYW0gd2luIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAwOSZuZGFzaDsxMCBFa3N0cmFrbGFzYSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAwOSVFMiU4MCU5MzEwX0Vrc3RyYWtsYXNhIj4yMDA5Jm5kYXNoOzEwIEVrc3RyYWtsYXNhPC9hPi4gSW4gMjAxMCwgaGUgdHJhbnNmZXJyZWQgdG8mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkJvcnVzc2lhIERvcnRtdW5kIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Cb3J1c3NpYV9Eb3J0bXVuZCI+Qm9ydXNzaWEgRG9ydG11bmQ8L2E+LCB3aGVyZSBoZSB3b24gaG9ub3VycyBpbmNsdWRpbmcgdHdvIGNvbnNlY3V0aXZlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJNZWlzdGVyc2NoYWxlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NZWlzdGVyc2NoYWxlIj5CdW5kZXNsaWdhIHRpdGxlczwvYT4mbmJzcDthbmQgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSIyMDEzJm5kYXNoOzE0IEJ1bmRlc2xpZ2EiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTMlRTIlODAlOTMxNF9CdW5kZXNsaWdhI1RvcF9zY29yZXJzIj5sZWFndWUncyB0b3AgZ29hbHNjb3JlcjwvYT4mbmJzcDthd2FyZC4gSW4gMjAxMywgaGUgYWxzbyBmZWF0dXJlZCB3aXRoIERvcnRtdW5kIGluIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iMjAxMyBVRUZBIENoYW1waW9ucyBMZWFndWUgRmluYWwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMTNfVUVGQV9DaGFtcGlvbnNfTGVhZ3VlX0ZpbmFsIj4yMDEzIFVFRkEgQ2hhbXBpb25zIExlYWd1ZSBGaW5hbDwvYT4uIFByaW9yIHRvIHRoZSBzdGFydCBvZiB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTQmbmRhc2g7MTUgQnVuZGVzbGlnYSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvMjAxNCVFMiU4MCU5MzE1X0J1bmRlc2xpZ2EiPjIwMTQmbmRhc2g7MTUgc2Vhc29uPC9hPiwgTGV3YW5kb3dza2kgYWdyZWVkIHRvIGpvaW4gRG9ydG11bmQncyBkb21lc3RpYyByaXZhbHMsIEJheWVybiBNdW5pY2gsIG9uIGEmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkZyZWUgdHJhbnNmZXIgKGFzc29jaWF0aW9uIGZvb3RiYWxsKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRnJlZV90cmFuc2Zlcl8oYXNzb2NpYXRpb25fZm9vdGJhbGwpIj5mcmVlIHRyYW5zZmVyPC9hPi4gSW4gTXVuaWNoLCBoZSBoYXMgd29uIHRoZSBCdW5kZXNsaWdhIHRpdGxlIGluIGVhY2ggb2YgaGlzIGZpcnN0IHNldmVuIHNlYXNvbnMuIExld2FuZG93c2tpIHdhcyBpbnRlZ3JhbCBpbiBCYXllcm4ncyZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9VRUZBX0NoYW1waW9uc19MZWFndWUiPlVFRkEgQ2hhbXBpb25zIExlYWd1ZTwvYT4mbmJzcDt3aW4gaW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTkmbmRhc2g7MjAgVUVGQSBDaGFtcGlvbnMgTGVhZ3VlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS8yMDE5JUUyJTgwJTkzMjBfVUVGQV9DaGFtcGlvbnNfTGVhZ3VlIj4yMDE5Jm5kYXNoOzIwPC9hPiZuYnNwO2FzIHBhcnQgb2YgYSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVHJlYmxlIChhc3NvY2lhdGlvbiBmb290YmFsbCkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1RyZWJsZV8oYXNzb2NpYXRpb25fZm9vdGJhbGwpIj50cmVibGU8L2E+LiBIZSBpcyBvbmUgb2Ygb25seSB0d28gcGxheWVycywgYWxvbmdzaWRlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJKb2hhbiBDcnV5ZmYiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0pvaGFuX0NydXlmZiI+Sm9oYW4gQ3J1eWZmPC9hPiwgdG8gYWNoaWV2ZSB0aGUgRXVyb3BlYW4gdHJlYmxlLCB3aGlsZSBiZWluZyB0aGUgaGlnaGVzdCBnb2Fsc2NvcmVyIGluIGFsbCB0aHJlZSBjb21wZXRpdGlvbnMsIGFuZCBmaXJzdCB0byBkbyBpdCBhcyB0aGUgc29sZSB0b3Agc2NvcmVyLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5BIGZ1bGwgaW50ZXJuYXRpb25hbCBmb3IgUG9sYW5kIHNpbmNlIDIwMDgsIExld2FuZG93c2tpIGhhcyBlYXJuZWQgb3ZlciAxMjAgY2FwcyBhbmQgd2FzIGEgbWVtYmVyIG9mIHRoZWlyIHRlYW0gYXQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlVFRkEgRXVybyAyMDEyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9VRUZBX0V1cm9fMjAxMiI+VUVGQSBFdXJvIDIwMTI8L2E+LCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iVUVGQSBFdXJvIDIwMTYiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1VFRkFfRXVyb18yMDE2Ij5FdXJvIDIwMTY8L2E+LCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IjIwMTggRklGQSBXb3JsZCBDdXAiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpLzIwMThfRklGQV9Xb3JsZF9DdXAiPjIwMTggRklGQSBXb3JsZCBDdXA8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJVRUZBIEV1cm8gMjAyMCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVUVGQV9FdXJvXzIwMjAiPkV1cm8gMjAyMDwvYT4uIFdpdGggNzUgaW50ZXJuYXRpb25hbCBnb2FscywgTGV3YW5kb3dza2kgaXMgdGhlIGFsbC10aW1lIHRvcCBzY29yZXIgZm9yIFBvbGFuZC4gSGUgd29uJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJJRkZIUyBXb3JsZCdzIEJlc3QgSW50ZXJuYXRpb25hbCBHb2FsIFNjb3JlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSUZGSFNfV29ybGQlMjdzX0Jlc3RfSW50ZXJuYXRpb25hbF9Hb2FsX1Njb3JlciI+SUZGSFMgV29ybGQncyBCZXN0IEludGVybmF0aW9uYWwgR29hbCBTY29yZXIgQXdhcmQ8L2E+Jm5ic3A7aW4gMjAxNSBhbmQgMjAyMSwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IkludGVybmF0aW9uYWwgRmVkZXJhdGlvbiBvZiBGb290YmFsbCBIaXN0b3J5ICZhbXA7IFN0YXRpc3RpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ludGVybmF0aW9uYWxfRmVkZXJhdGlvbl9vZl9Gb290YmFsbF9IaXN0b3J5XyUyNl9TdGF0aXN0aWNzI1RoZV9Xb3JsZCdzX0Jlc3RfVG9wX0dvYWxfU2NvcmVyIj5JRkZIUyBXb3JsZCdzIEJlc3QgVG9wIEdvYWwgU2NvcmVyIEF3YXJkPC9hPiZuYnNwO2luIDIwMjAgYW5kIDIwMjEsIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iSUZGSFMgV29ybGQncyBCZXN0IFRvcCBEaXZpc2lvbiBHb2FsIFNjb3JlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSUZGSFNfV29ybGQlMjdzX0Jlc3RfVG9wX0RpdmlzaW9uX0dvYWxfU2NvcmVyIj5JRkZIUyBXb3JsZCdzIEJlc3QgVG9wIERpdmlzaW9uIEdvYWwgU2NvcmVyIEF3YXJkPC9hPiZuYnNwO2luIDIwMjEuIEhlIGFsc28gd29uIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iSUZGSFMgV29ybGQncyBCZXN0IFBsYXllciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSUZGSFNfV29ybGQlMjdzX0Jlc3RfUGxheWVyIj5JRkZIUyBXb3JsZCdzIEJlc3QgUGxheWVyPC9hPiZuYnNwO2luIDIwMjAgYW5kIDIwMjEgYW5kIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IiB0aXRsZT0iRXVyb3BlYW4gR29sZGVuIFNob2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V1cm9wZWFuX0dvbGRlbl9TaG9lIj5FdXJvcGVhbiBHb2xkZW4gU2hvZTwvYT4mbmJzcDtmb3IgdGhlIDIwMjAmbmRhc2g7MjEgc2Vhc29uLiBNb3Jlb3ZlciwgTGV3YW5kb3dza2kgaGFzIGJlZW4gbmFtZWQgdGhlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsiIHRpdGxlPSJQacWCa2Egbm/FvG5hIG1hZ2F6aW5lIHBsZWJpc2NpdGUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BpJUM1JTgya2Ffbm8lQzUlQkNuYV9tYWdhemluZV9wbGViaXNjaXRlIj5Qb2xpc2ggRm9vdGJhbGxlciBvZiB0aGUgWWVhcjwvYT4mbmJzcDthIHJlY29yZCBuaW5lIHRpbWVzIGFuZCB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyIgdGl0bGU9IlBvbGlzaCBTcG9ydHMgUGVyc29uYWxpdHkgb2YgdGhlIFllYXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BvbGlzaF9TcG9ydHNfUGVyc29uYWxpdHlfb2ZfdGhlX1llYXIiPlBvbGlzaCBTcG9ydHMgUGVyc29uYWxpdHkgb2YgdGhlIFllYXI8L2E+Jm5ic3A7dGhyZWUgdGltZXMuPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', '05042022134524d.jpg', 'striker');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `title`, `description`) VALUES
(1, 'sample1.webp', 'John Doe', 'TmVxdWUgcG9ycm8gcXVpc3F1YW0gZXN0IHF1aSBkb2xvcmVtIGlwc3VtIHF1aWEgZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyLCBhZGlwaXNjaSB2ZWxpdC4uLg=='),
(2, 'sample1.webp', 'John Doe', 'TmVxdWUgcG9ycm8gcXVpc3F1YW0gZXN0IHF1aSBkb2xvcmVtIGlwc3VtIHF1aWEgZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyLCBhZGlwaXNjaSB2ZWxpdC4uLg=='),
(3, 'sample1.webp', 'John Doe', 'TmVxdWUgcG9ycm8gcXVpc3F1YW0gZXN0IHF1aSBkb2xvcmVtIGlwc3VtIHF1aWEgZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyLCBhZGlwaXNjaSB2ZWxpdC4uLg==');

-- --------------------------------------------------------

--
-- Table structure for table `trems_and_condictions`
--

CREATE TABLE `trems_and_condictions` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trems_and_condictions`
--

INSERT INTO `trems_and_condictions` (`id`, `description`) VALUES
(1, 'PCFET0NUWVBFIGh0bWw+XHJcbjxodG1sPlxyXG48aGVhZD5cclxuPC9oZWFkPlxyXG48Ym9keT4NCjxoMj5Zb3VyIEFncmVlbWVudDwvaDI+DQo8cD5CeSB1c2luZyB0aGlzIHNpdGUsIHlvdSBhZ3JlZSB0byBiZSBib3VuZCBieSwgYW5kIHRvIGNvbXBseSB3aXRoLCB0aGVzZSBUZXJtcyBhbmQgQ29uZGl0aW9ucy4gSWYgeW91IGRvIG5vdCBhZ3JlZSB0byB0aGVzZSBUZXJtcyBhbmQgQ29uZGl0aW9ucywgcGxlYXNlIGRvIG5vdCB1c2UgdGhpcyBzaXRlLjwvcD4NCjxoND5QTEVBU0UgTk9URTo8L2g0Pg0KPHA+V2UgcmVzZXJ2ZSB0aGUgcmlnaHQsIGF0IG91ciBzb2xlIGRpc2NyZXRpb24sIHRvJm5ic3A7Y2hhbmdlLCBtb2RpZnkgb3Igb3RoZXJ3aXNlIGFsdGVyIHRoZXNlIFRlcm1zIGFuZCBDb25kaXRpb25zIGF0IGFueSB0aW1lLiBVbmxlc3Mgb3RoZXJ3aXNlIGluZGljYXRlZCwgYW1lbmRtZW50cyB3aWxsIGJlY29tZWVmZmVjdGl2ZSBpbW1lZGlhdGVseS4gUGxlYXNlIHJldmlldyB0aGVzZSBUZXJtcyBhbmQgQ29uZGl0aW9ucyBwZXJpb2RpY2FsbHkuIFlvdXIgY29udGludWVkIHVzZSBvZiB0aGUgU2l0ZSBmb2xsb3dpbmcgdGhlIHBvc3Rpbmcgb2YgY2hhbmdlcyBhbmQvb3IgbW9kaWZpY2F0aW9ucyB3aWxsIGNvbnN0aXR1dGUgeW91ciBhY2NlcHRhbmNlIG9mIHRoZSByZXZpc2VkIFRlcm1zIGFuZCBDb25kaXRpb25zIGFuZCB0aGUgcmVhc29uYWJsZW5lc3Mgb2YgdGhlc2Ugc3RhbmRhcmRzIGZvciBub3RpY2Ugb2YgY2hhbmdlcy4gRm9yIHlvdXIgaW5mb3JtYXRpb24sIHRoaXMgcGFnZSB3YXMgbGFzdCB1cGRhdGVkIGFzIG9mIHRoZSBkYXRlIGF0IHRoZSB0b3Agb2YgdGhlc2UgdGVybXMgYW5kIGNvbmRpdGlvbnMuPC9wPg0KPC9ib2R5PlxyXG48L2h0bWw+'),
(2, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+WW91ciBBZ3JlZW1lbnQ8L2gyPg0KPHA+QnkgdXNpbmcgdGhpcyBzaXRlLCB5b3UgYWdyZWUgdG8gYmUgYm91bmQgYnksIGFuZCB0byBjb21wbHkgd2l0aCwgdGhlc2UgVGVybXMgYW5kIENvbmRpdGlvbnMuIElmIHlvdSBkbyBub3QgYWdyZWUgdG8gdGhlc2UgVGVybXMgYW5kIENvbmRpdGlvbnMsIHBsZWFzZSBkbyBub3QgdXNlIHRoaXMgc2l0ZS48L3A+DQo8aDQ+UExFQVNFIE5PVEU6PC9oND4NCjxwPldlIHJlc2VydmUgdGhlIHJpZ2h0LCBhdCBvdXIgc29sZSBkaXNjcmV0aW9uLCB0byBjaGFuZ2UsIG1vZGlmeSBvciBvdGhlcndpc2UgYWx0ZXIgdGhlc2UgVGVybXMgYW5kIENvbmRpdGlvbnMgYXQgYW55IHRpbWUuIFVubGVzcyBvdGhlcndpc2UgaW5kaWNhdGVkLCBhbWVuZG1lbnRzIHdpbGwgYmVjb21lZWZmZWN0aXZlIGltbWVkaWF0ZWx5LiBQbGVhc2UgcmV2aWV3IHRoZXNlIFRlcm1zIGFuZCBDb25kaXRpb25zIHBlcmlvZGljYWxseS4gWW91ciBjb250aW51ZWQgdXNlIG9mIHRoZSBTaXRlIGZvbGxvd2luZyB0aGUgcG9zdGluZyBvZiBjaGFuZ2VzIGFuZC9vciBtb2RpZmljYXRpb25zIHdpbGwgY29uc3RpdHV0ZSB5b3VyIGFjY2VwdGFuY2Ugb2YgdGhlIHJldmlzZWQgVGVybXMgYW5kIENvbmRpdGlvbnMgYW5kIHRoZSByZWFzb25hYmxlbmVzcyBvZiB0aGVzZSBzdGFuZGFyZHMgZm9yIG5vdGljZSBvZiBjaGFuZ2VzLiBGb3IgeW91ciBpbmZvcm1hdGlvbiwgdGhpcyBwYWdlIHdhcyBsYXN0IHVwZGF0ZWQgYXMgb2YgdGhlIGRhdGUgYXQgdGhlIHRvcCBvZiB0aGVzZSB0ZXJtcyBhbmQgY29uZGl0aW9ucy48L3A+DQo8L2JvZHk+DQo8L2h0bWw+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `profile` text NOT NULL,
  `address` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `recovery_code` int(11) NOT NULL,
  `account_status` int(11) NOT NULL,
  `points_status` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`, `gender`, `pass`, `city`, `country`, `zip`, `profile`, `address`, `state`, `role`, `recovery_code`, `account_status`, `points_status`, `points`, `verify`) VALUES
(1, 'Ibrahim', 'Nawab', '', 'admin@gmail.com', '16014635797', 'Male', '202cb962ac59075b964b07152d234b70', 'USA', '', 'MA 02139', 'pp.jpg', 'Cambridge', '', 1, 0, 1, '', -31, 1),
(2, 'fry', 'micle', '', 'customer@gmail.com', '', 'Female', '202cb962ac59075b964b07152d234b70', 'Berlin', '', '75100', 'default.png', 'house no 815', '', 3, 0, 1, '', 0, 1),
(3, 'Brico', 'Dyn', '', 'vendor@gmail.com', '', 'Female', '202cb962ac59075b964b07152d234b70', 'berlin', '', '75100', 'default.png', 'this is email', '', 2, 0, 1, '', 0, 1),
(9, 'jack', 'Jos', '', 'techcommando34@gmail.com', '16014635797', 'Male', '202cb962ac59075b964b07152d234b70', 'San Francisco', 'New Zealand', '0377', 'default.png', 'adsd', 'Faisalabad', 3, 0, 1, '', -8, 1),
(11, 'Hamza', 'Khalid', '', '2@gmail.com', '090078601', '', '202cb962ac59075b964b07152d234b70', 'Karachi', 'Germany', '123456', '', 'None', 'IALSKD', 3, 1828901792, 1, '', -280, 1),
(12, 'Safa', 'IMRAN', '', 'SAFA@GMAIL.COM', '312456789', '', '202cb962ac59075b964b07152d234b70', 'KARACHI', 'Pakistan', '44550', 'default.png', 'XXX', 'Sindh', 3, 0, 1, '', 0, 1),
(13, 'Safa', 'Imran', '', 'safaimaam96@gmail.com', '03142219159', '', '202cb962ac59075b964b07152d234b70', 'roma, italy', 'Bangladesh', '55555', 'default.png', 'xxx', 'karachi', 3, 0, 1, '', 0, 0),
(14, 'Safa', 'IMRAN', '', 'SAFA22@GMAIL.COM', '312456789', '', '202cb962ac59075b964b07152d234b70', 'KARACHI', 'Pakistan', '44550', 'default.png', 'XXX', 'Sindh', 3, 0, 1, '', -8, 1),
(15, 'Elodie', 'Elodie', '', 'ehaustan@hotmail.fr', '0606060606', 'Female', 'f0d7065a7554c6021b2a32bf40d7864a', 'Les trois ilets', 'France', '97229', 'default.png', 'quartier la ferme', 'Martinique', 2, 0, 1, '', 0, 1),
(21, 'Zaid', 'Iftikhar', '', 'bestxmasoffers@gmail.com', '03142219159', 'Male', '202cb962ac59075b964b07152d234b70', 'roma, italy', 'Bahamas', '55555', 'default.png', 'xxx', 'karachi', 2, 0, 1, '', 0, 1),
(22, 'Zaid', 'Iftikhar', '', 'safaimaamgfhf96@gmail.com', '03142219159', 'Male', '698d51a19d8a121ce581499d7b701668', 'roma, italy', 'Bangladesh', '55555', 'default.png', 'xxx', 'karachi', 2, 0, 1, '', 0, 1),
(23, 'Zaid', 'Iftikhar', '', 'safaimfsdfaam96@gmail.com', '03142219159', 'Male', '698d51a19d8a121ce581499d7b701668', 'roma, italy', 'Bangladesh', '55555', 'default.png', 'xxx', 'karachi', 2, 0, 1, '', 0, 1),
(24, 'haboh', 'chatich', '', 'wopet94614@balaket.com', '312312315165', 'Male', '202cb962ac59075b964b07152d234b70', '232', 'Afganistan', '3213', '14022022115719watermark (1).png', '212', '321', 2, 0, 1, '', 0, 1),
(25, 'Zaid', 'Iftikhar', '', 'safaimututaam96@gmail.com', '03142219159', 'Male', 'fae0b27c451c728867a567e8c1bb4e53', 'roma, italy', 'Bangladesh', '55555', 'default.png', 'xxx', 'karachi', 2, 0, 1, '', 0, 1),
(26, 'haboh', 'chatich', '', 'limof56210@chatich.com', '312312315165', 'Male', '202cb962ac59075b964b07152d234b70', '2213', 'Albania', '3213', 'default.png', 'sdfgh', '321', 2, 0, 1, '', 0, 0),
(27, 'haboh', 'chatich', '', 'xomona6586@bepureme.com', '312312315165', 'Male', '202cb962ac59075b964b07152d234b70', '2213', 'Afganistan', '3213', 'default.png', 'asdfgh', '321', 2, 0, 1, '', 0, 0),
(28, 'Elodie', 'Elodie', '', 'lodiw@hotmail.fr', '0606060606', 'Female', 'f0d7065a7554c6021b2a32bf40d7864a', 'Franconville', 'France', '95130', 'default.png', '5 rue du crepuscule', 'Val d\'Oise', 2, 0, 1, '', 0, 1),
(31, 'Zaid', 'Iftikhar', '', 'zaidiftikhar27@gmail.com', '03142219159', 'Male', '250cf8b51c773f3f8dc8b4be867a9a02', 'roma, italy', 'Albania', '55555', '04042022211201pp.jpg', 'xxx', 'karachi', 2, 0, 1, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `name`, `relation`) VALUES
(1, 'Colors', 0),
(2, 'Size', 0),
(3, 'Red', 1),
(4, 'Blue', 1),
(5, 'XL', 2),
(6, 'L', 2),
(7, 'Style', 0),
(8, '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `variation_product`
--

CREATE TABLE `variation_product` (
  `id` int(11) NOT NULL,
  `var_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `length_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `price_usd` float NOT NULL,
  `price_gb` float NOT NULL,
  `price_cad` float NOT NULL,
  `price_euro` float NOT NULL,
  `percentage` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `vendor_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variation_product`
--

INSERT INTO `variation_product` (`id`, `var_id`, `p_id`, `color_id`, `size_id`, `length_id`, `weight_id`, `price_usd`, `price_gb`, `price_cad`, `price_euro`, `percentage`, `stock`, `vendor_amount`) VALUES
(39, 0, 6, 0, 0, 0, 6, 4.77, 0, 0, 4.77, 0, 80, 0),
(40, 0, 7, 0, 0, 0, 8, 12, 0, 0, 12, 0, 99, 0),
(41, 0, 8, 0, 0, 0, 8, 9.5, 0, 0, 9.5, 0, 91, 0),
(42, 0, 9, 0, 0, 0, 8, 9.27, 0, 0, 9.27, 0, 96, 0),
(43, 0, 10, 0, 0, 0, 8, 12, 0, 0, 12, 0, 88, 0),
(44, 0, 11, 0, 0, 0, 8, 12, 0, 0, 12, 0, 51, 0),
(45, 0, 12, 0, 0, 0, 8, 12, 0, 0, 12, 0, 65, 0),
(46, 0, 13, 0, 0, 0, 8, 4.9, 0, 0, 4.9, 0, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weight_variation`
--

CREATE TABLE `weight_variation` (
  `id` int(11) NOT NULL,
  `variation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight_variation`
--

INSERT INTO `weight_variation` (`id`, `variation`) VALUES
(3, '473ml'),
(4, '178ml'),
(5, '384ml'),
(6, '250ml'),
(7, '236ml'),
(8, '340g');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `ip`, `p_id`, `variation_id`, `date`) VALUES
(1, '192.-168.01.1', 1, 1, '2021-01-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_variation`
--
ALTER TABLE `color_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_email`
--
ALTER TABLE `invoice_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `length_variation`
--
ALTER TABLE `length_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_points`
--
ALTER TABLE `member_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_clients`
--
ALTER TABLE `our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_image`
--
ALTER TABLE `page_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addres`
--
ALTER TABLE `shipping_addres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_variation`
--
ALTER TABLE `size_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_sheet`
--
ALTER TABLE `team_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trems_and_condictions`
--
ALTER TABLE `trems_and_condictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_product`
--
ALTER TABLE `variation_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_variation`
--
ALTER TABLE `weight_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `color_variation`
--
ALTER TABLE `color_variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `invoice_email`
--
ALTER TABLE `invoice_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `length_variation`
--
ALTER TABLE `length_variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_points`
--
ALTER TABLE `member_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_clients`
--
ALTER TABLE `our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_image`
--
ALTER TABLE `page_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addres`
--
ALTER TABLE `shipping_addres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size_variation`
--
ALTER TABLE `size_variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `team_sheet`
--
ALTER TABLE `team_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trems_and_condictions`
--
ALTER TABLE `trems_and_condictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `variation_product`
--
ALTER TABLE `variation_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `weight_variation`
--
ALTER TABLE `weight_variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
