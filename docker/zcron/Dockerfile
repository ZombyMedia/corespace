####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

FROM alpine:latest
MAINTAINER ZombyMediaIC

RUN apk update && apk upgrade
RUN apk add php7 php7-fpm php7-opcache php7-mysqli
RUN apk add nano wget mysql

RUN mkdir programm
WORKDIR /programm

COPY crontab /etc/cron/crontab
RUN crontab /etc/cron/crontab
ENV EDITOR=/usr/bin/nano
CMD ["crond", "-f"]
