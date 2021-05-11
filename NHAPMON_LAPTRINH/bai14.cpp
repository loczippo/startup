#include <stdio.h>
#include <math.h>

struct diem{
	int a__x, a__y;
	int b__x, b__y;
	void nhap() {
		printf("Nhap vao toa do diem A(x): ");
		scanf("%d", &a__x);
		printf("Nhap vao toa do diem A(y): ");
		scanf("%d", &a__y);
		printf("Nhap vao toa do diem B(x): ");
		scanf("%d", &b__x);
		printf("Nhap vao toa do diem B(y): ");
		scanf("%d", &b__y);
	}
	float hesogoc() {
		return (float)((b__y-a__y)/(b__x-a__x));
	}
	float khoangcach() {
		return (float)sqrt(pow((b__y-a__y),2)+pow((b__x-a__x),2));
	}
} d1;
int main() {
	d1.nhap();
	printf("He so goc: %f\n", d1.hesogoc());
	printf("Khoang cach: %f", d1.khoangcach());
	return 0;
}
