#include <iostream>
using namespace std;
int main() {
	int n, tong=0;
	cout<<"Nhap n: ";
	cin>>n;
	for(int i=1;i<=n;i++) {
		tong+=tong*i;
	}
	cout<<"Tong la: "<<tong;
}
