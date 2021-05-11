#include <stdio.h>

int main() {
	float a,b,c;
	printf("Nhap a: ");
	scanf("%f", &a);
	printf("Nhap b: ");
	scanf("%f", &b);
	printf("Nhap c: ");
	scanf("%f", &c);
	printf("\n%f", a>b?a>c?a:c:b>c?b:c);
	
	
}
