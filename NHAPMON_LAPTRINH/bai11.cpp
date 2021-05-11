#include <stdio.h>

#define pi 3,1416
int main() {
	float r;
	printf("nhap vao ban kinh: ");
	scanf("%f", &r);
	printf("\nchu vi: %f", (2*r)*pi);
	printf("\nban kinh: %f", (r*r)*pi);
	return 0;
}
