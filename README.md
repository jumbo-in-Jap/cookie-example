# overview

this is sample app about cookie based handle.

# requirements

proxy: http://localhost
yii: http://localhost:9000/
nuxt: http://localhost:3000/

nginxをALBに見立ててCookieでの特定のURLの振り分けをする

-> http://localhost/test -(Cookieなし)-> yii(localhost:9000)
-> http://localhost/test -(Cookieあり)-> nuxt(localhost:3000)

# nginx setting

```
upstream default_app {
    server host.docker.internal:9000;
}

upstream new_app {
    server host.docker.internal:3000;
}

map $cookie_target $server {        # "$cookie_" の後にクッキー名を書く。
    testing new_app;                            # "1"のときはupstream new_appを利用
    default default_app;                        # どれにも該当しないときはupstream defaultを利用
}

...

location /mypage {
    proxy_pass http://$server; # 特定のPATHのURLはCookieで振り分ける
    proxy_redirect off;
}

location / {
    proxy_pass http://host.docker.internal:9000;
    proxy_redirect off;
}

```