FROM bitnami/node:latest

# Node user/group
RUN groupadd -g 1000 appgroup \
    && useradd -m -u 1000 -g 1000 nodeuser

WORKDIR /var/www/html

USER nodeuser

CMD ["bash"]
