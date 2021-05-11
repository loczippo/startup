#include <stdio.h>
#include <Math.h>
int main() {
	float a, b, c;
	printf("Nhap vao he so a: ");
	scanf("%f", &a);
	printf("Nhap vao he so b: ");
	scanf("%f", &b);
	printf("Nhap vao he so c: ");
	scanf("%f", &c);
	
	float delta = b*b-4*a*c;
	float x1= (-b-(sqrt(delta)))/(2*a);
	float x2= (-b+(sqrt(delta)))/(2*a);
	if(delta == 0) {
		printf("Phuong trinh co nghiem kep x1=x2= %f", -b/(2*a));
	}
	else if(delta >0) {
		printf("Phuong trinh co 2 nghiem x1= %f, x2= %f", x1,x2);
	}
	else printf("Phuong trinh vo nghiem");
	return 0;
}
