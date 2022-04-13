program 5_20;
var n, i:integer;
    k,s,op,rp,d,profit:real;
    Begin
    Read(n);
    s:=0;
    for i:=1 to n do begin
        Read(k);
        Read(op);
        Read(rp);
        Read(d);
        profit:=k*rp-k/100*op*d;
        s:=s+profit;
                       end;
        Write(s:0:2);
end.