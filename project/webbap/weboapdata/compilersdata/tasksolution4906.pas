type mas=array [1..100] of integer;
var a:mas; i,n,s,p,l:byte;

procedure BinaryInsertionSort(var Arr : mas; N : Integer);
var
  B,C,E,I,J,K : Integer;
  Tmp : integer;
begin
  i:=2;
  repeat
    b:=1;
    e:=i-1;
    c:=((b+e) div 2);
    while b<>c do
    begin
      if Arr[c-1]>=Arr[i-1] then
      begin
        e:=c;
        inc(s);
      end
      else
      begin
        b:=c;
        inc(s);
      end;
      c:=((b+e) div 2);
    end;
    if Arr[b-1]<=Arr[i-1] then
    begin
      inc(s);
      if Arr[i-1]>=Arr[e-1] then
      begin
        b:=e+1;
        inc(s);
      end
      else
      begin
        b:=e;
        inc(s);
      end;
    end
    else
      inc(s);
    k:=i;
    Tmp:=Arr[i-1];
    if k>b then
    begin
    while k>b do
    begin
      Arr[k-1]:=Arr[k-1-1];
      dec(k);
    end;
    Arr[b-1]:=Tmp;
    for l:=0 to n-1 do
      write(arr[l]:3);
    writeln;
    inc(p);
    end
    else
      Arr[b-1]:=Tmp;
    inc(i);
  until not(i<=n);
end;

begin
  readln(n);
  for i:=0 to n-1 do
    read(a[i]);
  BinaryInsertionSort(a, n);
  writeln(s);
  writeln(p);
  for i:=0 to n-1 do
    write(a[i]:3);
  writeln;
  readln;
end.