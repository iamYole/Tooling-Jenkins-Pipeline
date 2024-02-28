FROM mysql/mysql-server:latest
LABEL "Project"="Tooling App"
LABEL "Author"="Gideon"

ENV MYSQL_USER = "webaccess"
ENV MYSQL_ROOT_PASS = "PassW0rd.1"
ENV MYSQL_DATABASE = "toolingdb"

ADD tooling_db_schema.sql /docker-entrypoint-initdb.d/tooling_db_schema.sql

#COPY my_custom.cnf /etc/mysql/my.cnf
