#include <stdio.h>
#include <math.h>

int main() {
	int x,y;
	printf("Nhap vao so nguyen duong x, y: ");
	scanf("%d%d", &x, &y);
	
	printf("Ket qua: %d", (int)pow(x,y));
	return 0;
}
