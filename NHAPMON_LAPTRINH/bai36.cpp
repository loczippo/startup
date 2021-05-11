#include <stdio.h>
#include <Math.h>
int main() {
	int n;
	do {
		printf("Nhap n: ");
		scanf("%d", &n);
	}
	while(n<0);
	
	if(sqrt(n) == (int)sqrt(n)) {
		printf("%d la so chinh phuong", n);
	}
	else printf("Khong la so chinh phuong");
	return 0;
}
