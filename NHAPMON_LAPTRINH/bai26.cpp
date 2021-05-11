#include <stdio.h>
#include <string.h>

int main() {
	char kitu;
	printf("Nhap vao ki tu: ");
	scanf("%c", &kitu);
//	chuyen kitu sang kieu number de xet 0-9
	int num = 0;
	num = kitu-'0';
	for(int i=1;i<=9;i++) {
		if(i==num) {
			printf("%d", num);
			return 0;
		}
		
	}
//	xet kitu tu A-Z
	switch(kitu) {
		
		case 'A':
			printf("10");
			break;
		case 'B':
			printf("11");
			break;
		case 'C':
			printf("12");
			break;
		case 'D':
			printf("13");
			break;
		case 'E':
			printf("14");
			break;
		case 'F':
			printf("15");
			break;
		
		default:
			printf("Khong phai he thap luc phan");
			return 0;
	}
	
	
}
