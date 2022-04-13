type mas=array[1..100] of integer;
var a:mas;   i,n,s,p,l:byte;
procedure HeapSort(var Arr : mas; N : Integer);
var
i,j,k,t,e:Integer;
Tmp:integer;
begin
i:=2;
repeat
t:=i;
while t<>1 do
begin
k:=t div 2;
if Arr[k-1]<=Arr[t-1] then
begin
t:=1;
inc(s);
end
else
begin
inc(s);
Tmp:=Arr[k-1];
Arr[k-1]:=Arr[t-1];
Arr[t-1]:=Tmp;
inc(p);
for l:=0 to n-1 do
write(arr[l]:3);
write;
t:=k;
end;
end;
inc(i)
until not(i<=n);
i:=n-1;
repeat
e:=0;
Tmp:=Arr[i];
Arr[i]:=Arr[e];
Arr[e]:=Tmp;
for L:=0 to n-1 do
write(arr[l]:3);
write;
inc(p);
t:=1;
while t<>0 do
begin
k:=2*t;
if k>i then t:=0
else
begin
if k<i then
if Arr[k]<Arr[k-1] then
begin
inc(k);
inc(s);
end
else
inc(s);
if Arr[t-1]<=Arr[k-1] then
begin
t:=0;
inc(s);
end
else
begin
inc(s);
Tmp:=Arr[k-1];
Arr[k-1]:=Arr[t-1];
Arr[t-1]:=Tmp;
inc(p);
for l:=0 to n-1 do
write(arr[l]:3);
writeln;
t:=k;
end;
end;
end;
dec(i)
until not(i>=1);
end;
begin
read(n);
for i:=0 to n-1 do
read(a[i]);
HeapSort(a, n);
write(s);
write(p);
for i:=0 to n-1 do
write(a[i]:3);
write;
read;
end. 