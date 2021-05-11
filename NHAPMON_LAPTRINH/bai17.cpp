#include <stdio.h>

struct DienTro{
	float r1;
	float r2;
	float r3;
	float TongTro=0;
	void nhap() {
		printf("Nhap gia tri tro: ");
		scanf("%f", &r1);
		printf("Nhap gia tri tro: ");
		scanf("%f", &r2);
		printf("Nhap gia tri tro: ");
		scanf("%f", &r3);
	}
	float execute() {
		r1=1/r1;
		r2=1/r2;
		r3=1/r3;
		TongTro=r1+r2+r3;
		return 1/TongTro;
	}
} dt;

int main() {
	dt.nhap();
	printf("Tong tro: %f", dt.execute());
	return 0;
}
