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

void InSoNguyenTo(int n) {
	if(n>2) {
		for(int i=2;i<=n;i++) {
			if(SoNguyenTo(i)) {
				printf("%d ", i);
			}
		}
	}
}

int main() {
	int n;
	printf("Nhap n: ");
	scanf("%d", &n);
	InSoNguyenTo(n);
	return 0;
}
