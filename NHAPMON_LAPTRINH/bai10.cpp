#include <stdio.h>

int main() {
	int tong=0;
	int x;
	do {
		printf("nhap vao 1 so nguyen duong nhe: ");
		scanf("%d", &x);
		tong+=x;
	}
	while(x!=0);
	printf("tong cac so vua nhap la %d", tong);
}
