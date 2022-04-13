program pr5z1;

type uc=record
     sn,n,ln,st:string;h,f:word;
end;

var i,w,m:longint;s1,s2:string;a:array[1..20] of uc;

begin
clrscr;

    readln(s1);

    readln(m);
    w:=1;
     for i:=1 to m do
             begin
             readln(s2);
             if s2=s1 then
begin
             with a[w] do begin
             readln(n);
             
             readln(ln);
             readln(st);
             readln(h);
             readln(f);
             sn:=s2;
             end;w:=w+1;end else
             begin
             readln(s2);
             readln(s2);
             readln(s2);
             readln(s2);
             readln(s2);
             end;
             end;
             i:=1;
    while a[i].st<>'' do
    begin
    with a[i] do begin
    writeln(sn);
    writeln(n);
    writeln(ln);
    writeln(st);
    writeln(h);
if i=w-1 then
    write(f) else writeln(f);end;i:=i+1;
    end;
end.