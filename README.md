# image-uploader
This is a tiny image uploader for the ShareX screenshot client.
It allows you to use your own server as the image hoster.

## Instructions
1. Clone this repository (`git clone git@github.com:DatDraggy/image-uploader.git`)
2. Enable .htaccess (or copy the content into your vHost) and mod_rewrite
3. Edit config/config.php so that it fits your needs
4. Change ownership of the directory to your webserver user (`chown -R www-data:www-data image-uploader/`)
5. Configure ShareX (Screenshots below)

Work in progress. Use at your own risk :P

If you need help, feel free to create an issue.

Basically, allow .htaccess on your webserver, then configure ShareX like this: (replace img.kieran.de with your own domain).

## ShareX Config

#### Request
![Request](https://img.kieran.de/7cu2FeK.png)

#### Response
URL Value: `https://img.kieran.de/$json:image.name$.$json:image.extension$`
![Response](https://img.kieran.de/Hvm9xKs.png)