#include <stdio.h>

int main() {
	int gio, phut, giay, giaythem;
	int hh, mm, ss;
	printf("Nhap vao gio: ");
	scanf("%d", &gio);
	printf("Nhap vao phut: ");
	scanf("%d", &phut);
	printf("Nhap vao giay: ");
	scanf("%d", &giay);
	printf("Nhap vao so giay can cong them: ");
	scanf("%d", &giaythem);
	giay+=giaythem;
	phut+=giay/60;
	ss=giay%60;
	hh=gio+phut/60;
	mm=phut%60;
	printf("So giay sau khi cong them %d giay = ", giaythem);
	if(hh<9) printf("0%d", hh);
		else printf("%d", hh);
	if(mm<9) printf(":0%d", mm);
		else printf(":%d", mm);
	if(ss<9) printf(":0%d", ss);
		else printf(":%d", ss);
	return 0;
	
}
