#include <stdio.h>

int main() {
	int s;
	float tong=0.0;
	printf("Nhap s: ");
	scanf("%d", &s);
	int i=1;
	while((tong+=(1.0/i)) < s) {
		i++;
	}
	printf("%d", i);
	return 0;
}
