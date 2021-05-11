#include <stdio.h>

int main() {
	char kitu;
	printf("Nhap vao ki tu cua ban: ");
	scanf("%c", &kitu);
	printf("Ma ascii cua %c la: %d\n", kitu, kitu);
	printf("Ki tu lien truoc la %c va co ma ascii la: %d\n", kitu++, --kitu);
	printf("Ki tu lien sau la %c va co ma ascii la: %d\n", kitu, ++kitu);
	return 0;
}
