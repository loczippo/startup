#include <stdio.h>

int main() {
	float a, b;
	printf("Nhap vao he so a: ");
	scanf("%d", &a);
	printf("Nhap vao he so b: ");
	scanf("%d", &b);
	if(a==0) {
		printf("\nPhuong trinh vo nghiem");
	}
	else printf("\nx= %f", -b/a);
	return 0;
}
