/*createServer.c*/
/*
 * make by tiankonguse
 *
 * gcc -o createServer createServer.c 生成 createServer 程序
 * 在服务器端运行./createServer
 *
 */

#include <sys/types.h>
#include <sys/socket.h>
#include <string.h>
#include <stdio.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>

char* pnumber = "0123456789";
char* pbigAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
char* psmallAlphabet = "abcdefghijklmnopqrstuvwxyz";
char* pother = "~!@#$%^&*()_+{}|:\"<>?`-=\';/.,";

char base[256];
int baseLength = 0;

void bornBase(char* base, int have, char* add) {
	if (have) {
		while (*add) {
			base[baseLength++] = *add++;
		}
	}
}

void createPW(char* output, int length, int number, int bigAlphabet,
		int smallAlphabet, int other) {
	baseLength = 0;
	bornBase(base, number, pnumber);
	bornBase(base, bigAlphabet, pbigAlphabet);
	bornBase(base, smallAlphabet, psmallAlphabet);
	bornBase(base, other, pother);
	base[baseLength] = '\0';
	int i;
	for (i = 0; i < length; i++) {
		output[i] = base[rand() % baseLength];
	}
	output[length] = '\0';
}

int main() {
	int sock;
	struct sockaddr_in server, client;
	int recvd, snd;
	int structlength;
	char * server_ip = "127.0.0.1";/*server ip address*/
	int port = 8888;
	char recvbuf[2000], sendbuf[2000];
	int inbuf;
	char str1[256];

	memset((char *) &server, 0, sizeof(server));
	server.sin_family = AF_INET;
	server.sin_addr.s_addr = inet_addr(server_ip);
	server.sin_port = htons(port);

	memset((char *) &client, 0, sizeof(client));
	client.sin_family = AF_INET;
	client.sin_addr.s_addr = htonl(INADDR_ANY);
	client.sin_port = htons(port);

	if ((sock = socket(AF_INET, SOCK_DGRAM, 0)) < 0) {
		printf("socket create error!\n");
		exit(1);
	}

	structlength = sizeof(server);
	if (bind(sock, (struct sockaddr *) &server, structlength) < 0) {
		printf("socket bind error!\n");
		perror("bind");
		exit(1);
	}
	if (daemon(1, 1) < 0) {
		perror("error daemon.../n");
		exit(1);
	}
	while (1) {
		structlength = sizeof(client);

		printf("waiting.......\n");
		recvd = recvfrom(sock, recvbuf, sizeof(recvbuf), 0,
				(struct sockaddr *) &client, &structlength);
		if (recvd < 0) {
			perror("recvfrom");
			exit(EXIT_FAILURE);
		} else {
			sscanf(recvbuf, "%d", &inbuf);
			int length = inbuf >> 4;
			int number = inbuf >> 3 & 1;
			int bigAlphabet = inbuf >> 2 & 1;
			int smallAlphabet = inbuf >> 1 & 1;
			int other = inbuf & 1;

			printf(
					"received:\n\t length:%d\n\t number:%d\n\t bigAlphabet:%d\n\t smallAlphabet%d\n\t other:%d\n",
					length, number, bigAlphabet, smallAlphabet, other);

			createPW(str1, length, number, bigAlphabet, smallAlphabet, other);
			printf("born:%s\n", str1);
			memset(sendbuf, 0, strlen(sendbuf));
			memcpy(sendbuf, str1, strlen(str1));

			snd = sendto(sock, sendbuf, strlen(str1), 0,
					(struct sockaddr *) &client, structlength);

			if (snd < 0) {
				perror("sendto");
				exit(1);
			}
			printf("sendok!\n");

		}

	}

	close(sock);
	return 0;
}

