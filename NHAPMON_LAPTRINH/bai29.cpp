#include<stdio.h>

int main() {
	int n, temp=0, save, i;
	printf("Nhap vao so:");
	scanf("%d", &n);
	save=n;
	for(i=0;i<save;i++){
		temp=n%10;
		n/=10;
		if(temp==0) {
			break;
		}
	}
	printf("so %d co %d chu so", save, i);
}
