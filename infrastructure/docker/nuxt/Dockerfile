FROM node:11.1

# locale & timezone (Asia/Tokyo)
# https://github.com/moby/moby/issues/12084
ENV LANG C.UTF-8
ENV TZ Asia/Tokyo

# system update
RUN apt-get update && \
    apt-get install -y vim less

WORKDIR /root

# install yarn command.
# - https://yarnpkg.com/lang/ja/docs/install/#alternatives-stable
# - https://github.com/yarnpkg/yarn/releases
ARG CMD_YARN_VERSION=1.13.0
RUN npm install --global yarn@$CMD_YARN_VERSION && \
    chmod +x /usr/local/bin/yarn

# install direnv command.
# - https://github.com/direnv/direnv
# - https://github.com/direnv/direnv/releases
ARG DEV_DIRENV_VERSION=v2.19.0
RUN wget -O direnv https://github.com/direnv/direnv/releases/download/$DEV_DIRENV_VERSION/direnv.linux-amd64 && \
    mv direnv /usr/local/bin/ && \
    chmod +x /usr/local/bin/direnv && \
    echo 'eval "$(direnv hook bash)"' >> ~/.bashrc

# install vue-cli
RUN npm install --global @vue/cli @vue/cli-init

# copy application code from host.
# ADD ./../../src/nuxt /src
WORKDIR /src/app

# ↓ここから下は後で、コメントアウトを解除します
## install packages.
# RUN yarn install

EXPOSE 3000
# CMD ["yarn", "run", "dev"]