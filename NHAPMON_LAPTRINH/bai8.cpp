#include <stdio.h>

int tinh(int x);
int main() {
	int x;
	printf("Nhap n: ");
	scanf("%d", &x);
	printf("Tong S= %d", tinh(x));
	return 0;
}

int tinh(int x) {
	if(x==1) return 1;
	return x*tinh(x-1);
}
