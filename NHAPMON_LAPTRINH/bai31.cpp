#include <stdio.h>

int main() {
	int n, songuoc=0;
	printf("Nhap n: ");
	scanf("%d", &n);
	while(n>0) {
		songuoc=(songuoc*10)+(n%10);
		n/=10;
	}
	printf("ket qua: %d", songuoc);
}
