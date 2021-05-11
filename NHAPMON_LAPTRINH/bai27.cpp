#include <stdio.h>

int main() {
	int n;
	printf("nhap n: ");
	scanf("%d", &n);
	int array[n];
	int vitri=0;
	for(int i=0;i<n;i++) {
		printf("Nhap vao a[%d]: ", i);
		scanf("%d", &array[i]);
	}
	int max=array[0];
	for(int i=0;i<n;i++) {
		if(array[i]>max) {
			max=array[i];
			vitri=i;
		}
	}
	printf("Max la: %d co vi tri thu %d", max, vitri);
	return 0;
}
