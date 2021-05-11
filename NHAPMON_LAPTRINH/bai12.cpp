#include <stdio.h>
#include <Math.h>
int main() {
	float a, b, c;
	printf("Nhap vao do dai 3 canh abc: ");
	scanf("%f%f%f", &a,&b,&c);
	double ncv = (a+b+c)/2;
	if((a+b>c && a+c>b && b+c>a)&&(a-b<c && a-c<b && b-c<a)) {
		printf("Nua chu vi: %f\n", ncv);
		printf("Dien tich: %f", sqrt(ncv*(ncv-a)*(ncv-b)*(ncv-c)));
	}
	else printf("Do dai 3 canh khong phai tam giac");
	return 0;
}
