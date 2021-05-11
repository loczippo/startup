#include <stdio.h>

int main() {
	int n;
	int tong=1;
	int temp=0;
	printf("Nhap n: ");
	scanf("%d", &n);
	for(int i=1;i<=n;i++) {
		printf("Nhap so nguyen thu %d: ", i);
		scanf("%d", &temp);
		if(temp%2==0) tong+=temp;
		else tong-=temp;
	}
	printf("Tong la: %d", tong);
	return 0;
}
