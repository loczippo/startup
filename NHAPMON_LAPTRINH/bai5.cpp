#include <stdio.h>

int main() {
	int n;
	int tich=0;
	int temp=0;
	printf("Nhap n: ");
	scanf("%d", &n);
	for(int i=1;i<=n;i++) {
		printf("Nhap so nguyen thu %d: ", i);
		scanf("%d", &temp);
		tich+=temp;
	}
	printf("Tich: %d", tich);
	return 0;
}
