#include <stdio.h>

int main() {
	int dem=0;
	for(int i=0;i<=255;i++) {
		dem++;
		if(dem==20) { //if((i-1)%20==0)
			printf("\n");
			dem=0;
		}
		printf("%c  ", i);
	}
}
