#include <stdio.h>

int main() {
	int n;
	printf("Nhap n: ");
	scanf("%d", &n);
	for(int i=0;i<n;i++) {
		if((2*i) > n) {
			printf("%d", i);
			break;
		}
	}
	return 0;
}
