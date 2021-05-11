#include <stdio.h>
#include <Math.h>

int main() {
	int n;
	int tong=0;
	int temp=0;
	printf("Nhap n: ");
	scanf("%d", &n);
	for(int i=1;i<=n;i++) {
		printf("Nhap so nguyen thu %d: ", i);
		scanf("%d", &temp);
		tong+=pow(temp, 2);
	}
	printf("Tong la: %d", tong);
	return 0;
}
