CREATE TABLE `files` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `image_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `audio_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `description` longtext COLLATE utf8_unicode_ci NOT NULL,

 `uploaded_on` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;