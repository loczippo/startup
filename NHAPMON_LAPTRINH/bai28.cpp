#include <stdio.h> 

int main() {
	int n;
	printf("Nhap n: ");
	scanf("%d", &n);
	int value1 = 1, value2 = 1, a = 0;
	printf("%d %d ", value1, value2);
	//i=2 tru 2 so value 1 va value 2
	for (int i = 2; i < n; i++)
	{
		a = value1 + value2;
		printf("%d ", a);
		value1 = value2;
		value2 = a;
	}
	return 0;
}
