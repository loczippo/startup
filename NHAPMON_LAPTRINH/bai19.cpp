#include <stdio.h>
#include <math.h>

int main() {
	int a, b;
	char kitu;
	int tmp=0;
	printf("Nhap a: ");
	scanf("%d", &a);
	printf("Nhap b: ");
	scanf("%d", &b);
	fflush(stdin);
	printf("\nNhap vao dau phep toan: ");
	scanf("%c", &kitu);
	switch(kitu) {
		case '+':
			tmp=a+b;
			break;
		case '-':
			tmp=a-b;
			break;
		case '*':
			tmp=a*b;
			break;
		case '/':
			tmp=a/b;
			break;
		case '%':
			tmp=a%b;
			break;
		case '|':
			tmp=a|b;
			break;
		case '^':
			tmp=a^b;
			break;
		case '<':
			tmp=a<<b;
			break;
		case '>':
			tmp=a>>b;
			break;
		default: tmp = 0;
	}
	printf("ket qua cua a %c b = %d", kitu, tmp);
	return 0;
}
