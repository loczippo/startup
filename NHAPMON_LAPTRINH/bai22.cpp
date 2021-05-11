#include <stdio.h>

int main() {
	int a;
	int temp=0;
	int tong=0;
	int dem=1;
	printf("Nhap vao so:");
	scanf("%d", &a);
	for(int i=0;i<dem;i++, dem++){
		temp=a%10;
		a/=10;
		if(temp==0) {
			break;
		}
		tong+=temp;
	}
	if(tong%3==0) {
		printf("Chia het cho 3");
	}
	else {
		printf("Khong chia het cho 3");
	}
	return 0;
}
