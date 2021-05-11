#include <stdio.h>
#include <Math.h>
int SoNguyenTo(int n) {
	if(n<=1) return 0;
	if(n==2) return 1;
	for(int i=2;i<=sqrt(n);i++) {
		if(n%i==0) {
			 return 0;
		}
	}
	return 1;
}
int main() {
	int n;
	printf("Nhap vao so: ");
	scanf("%d", &n);
	if(SoNguyenTo(n)) printf("%d la so nguyen to!",n);
	else printf("%d khong la so nguyen to!", n);
	return 0;
}
