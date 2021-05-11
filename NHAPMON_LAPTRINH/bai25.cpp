#include <stdio.h>

int main() {	
	char kitu;
	printf("Nhap vao ki tu: ");
	scanf("%c", &kitu);
	if(kitu>=65 && kitu<97) {
		printf("ki tu hoa");
	}  
	else if(kitu>=97 && kitu<=122) {
		printf("ki tu thuong");
	}
	else if(kitu>=48 && kitu<=57) {
		printf("ki tu so");
	}
	else {
		printf("ki tu khac");
	}
	return 0;
}
