#include <stdio.h>
#include <math.h>

int main() {
	int n;
	int s=0;
	printf("Nhap n: ");
	scanf("%d", &n);
	for(int i=1;i<=n;i++) {
		i%2==0?s-=i:s+=i;
	}
	printf("Tong la: %d", s);
	
	return 0;
}

